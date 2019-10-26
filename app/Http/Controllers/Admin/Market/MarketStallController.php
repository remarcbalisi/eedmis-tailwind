<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\MarketStall;
use Illuminate\Http\Request;

class MarketStallController extends Controller
{
    public function index()
    {
        return view('admin.market.stall.list')->with([
            'market_stalls' => MarketStall::get(),
        ]);
    }
}
