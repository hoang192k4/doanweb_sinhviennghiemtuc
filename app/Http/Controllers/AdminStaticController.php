<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminStaticController extends Controller
{
    public function index()
    {
        $sum = [];
        for ($month = 1; $month <= 12; $month++) {
            $sum[$month - 1] = Order::whereYear('created_at', 2024)->whereMonth('created_at', $month)->sum('total_price');
        }
        $count = [];
        for ($month = 1; $month <= 12; $month++) {
            $count[$month - 1] = Order::whereYear('created_at', 2024)->whereMonth('created_at', $month)->count('order_code');
        }
        return view('admin.pages.statistical')->with('sum', $sum)->with('count', $count);
    }
}
