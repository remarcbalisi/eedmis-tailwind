<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\MarketDepartment;
use App\MarketStall;
use App\User;
use Illuminate\Http\Request;

class MarketStoreController extends Controller
{
    public function index()
    {
        return view('admin.market.store.list');
    }

    public function create()
    {
        return view('admin.market.store.create')->with([
            'tenants' => User::role('tenant')->get(),
            'departments' => MarketDepartment::get(),
            'stalls' => MarketStall::get(),
        ]);
    }
}
