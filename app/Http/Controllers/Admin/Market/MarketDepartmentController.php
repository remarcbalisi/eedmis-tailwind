<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\MarketDepartment;
use Illuminate\Http\Request;

class MarketDepartmentController extends Controller
{
    public function index()
    {
        return view('admin.market.department.list')->with([
            'market_departments' => MarketDepartment::get(),
        ]);
    }
}
