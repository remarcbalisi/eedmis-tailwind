<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarketStallStoreRequest;
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

    public function create()
    {
        return view('admin.market.stall.create');
    }

    public function store(MarketStallStoreRequest $request)
    {
        $new_stall = MarketStall::create($request->all());
        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' . $new_stall->stall_number,
        ]);
    }
}
