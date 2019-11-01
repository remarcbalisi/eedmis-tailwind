<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarketStoreStoreRequest;
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

    public function store(MarketStoreStoreRequest $request)
    {
        $new_store = MarketStore::firstOrCreate(
            [
                'stall_id' => $request->stall_id,
                'is_active' => true,
            ],
            [
                $request->except(['stall_id'])
            ]
        );
        $success_msg = $new_store->wasRecentlyCreated ? "Successfully added " . $new_store->name : $new_store->name . " There's an active store in this selected stall";
        return redirect()->back()->with(compact('new_store', 'success_msg'));
    }
}
