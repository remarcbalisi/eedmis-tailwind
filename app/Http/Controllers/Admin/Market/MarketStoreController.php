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
        $new_store = MarketStore::create($request->all());
        $success_msg = "Successfully added " . $new_store->name;
        return redirect()->back()->with(compact('new_store', 'success_msg'));
    }
}
