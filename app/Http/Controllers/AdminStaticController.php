<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminStaticController extends Controller
{
    public function index()
    {
        $monthly = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthly[$month - 1] = Order::whereYear('created_at', 2024)->whereMonth('created_at', $month)->sum('total_price');
        }
        return view('admin.pages.statistical')->with('monthly',$monthly);
    }
}
