<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function statistics(Request $request)
    {
        // Lấy các tham số từ request
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m'));
        $statisticType = $request->input('statistic_type');

        // Khởi tạo mảng để lưu tổng giá trị đơn hàng và số lượng đơn hàng
        $sum = 0;
        $count = 0;

        if ($statisticType == 'year') {
            // Thống kê theo năm
            $sum = Order::whereYear('created_at', $year)->sum('total_price');
            $count = Order::whereYear('created_at', $year)->count('order_code');
        } elseif ($statisticType == 'month') {
            // Thống kê theo tháng
            $sum = Order::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->sum('total_price');

            $count = Order::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count('order_code');
        }

        return response()->json(['sum' => $sum, 'count' => $count]);
    }
}
