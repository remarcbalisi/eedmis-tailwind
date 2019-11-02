<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarketStoreStoreRequest;
use App\Http\Requests\MarketStoreUpdateRequest;
use App\MarketDepartment;
use App\MarketStall;
use App\MarketStore;
use App\User;

class MarketStoreController extends Controller
{
    public function index()
    {
        return view('admin.market.store.list')->with([
            'stores' => MarketStore::get(),
        ]);
    }

    public function create()
    {
        return view('admin.market.store.create')->with([
            'tenants' => User::role('tenant')->get(),
            'departments' => MarketDepartment::get(),
            'stalls' => MarketStall::get(),
        ]);
    }

    public function show(MarketStore $store)
    {
        return view('admin.market.store.show')->with(compact('store'));
    }

    public function store(MarketStoreStoreRequest $request)
    {
        $new_store = MarketStore::firstOrCreate(
            [
                'stall_id' => $request->stall_id,
                'is_active' => true,
            ],
            $request->except('stall_id')
        );
        $success_msg = $new_store->wasRecentlyCreated ? "Successfully added " . $new_store->name : $new_store->name . " There's an active store in this selected stall";
        return redirect()->back()->with(compact('new_store', 'success_msg'));
    }

    public function edit(MarketStore $store)
    {
        $tenants = User::role('tenant')->get();
        $departments = MarketDepartment::get();
        $stalls = MarketStall::get();

        return view('admin.market.store.edit')->with(compact('store', 'tenants', 'departments', 'stalls'));
    }

    public function update(MarketStoreUpdateRequest $request, MarketStore $store)
    {
        $updated_store = tap($store)->update($request->all());

        $success_msg = "Successfully updated " . $updated_store->name;
        return redirect()->back()->with(compact('updated_store', 'success_msg'));
    }

    public function destroy(MarketStore $store)
    {
        $store->delete();
        return redirect()->back();
    }
}
