<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
    public function listData($ngay)
    {
        return
            DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select(
                DB::raw('DATE(orders.created_at) AS `created_at`'),
                DB::raw('SUM(orders.order_code) AS total_quantity_revenue'),
                DB::raw('SUM(orders.total_price) AS total_price'),
                DB::raw('SUM(order_items.quantity) AS total_quantity_product'),
            )
            ->where('orders.order_status_id', '=', '6')
            ->where('orders.created_at', '>=', $ngay)
            ->where('orders.created_at', '>=', DB::raw("CURDATE() - INTERVAL {$ngay} DAY"))
            ->groupBy(DB::raw('DATE(orders.created_at)'))
            ->get();
    }
    public function statistics(Request $request)
    {
        $data = $request->statistic_type;

        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $lastmonth = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $previousMonth = Carbon::createFromFormat('Y-m-d', $lastmonth)->subMonth()->toDateString();
        // In ra kết quả

        // Lấy dữ liệu đơn hàng dựa trên loại thống kê
        if ($data == '7ngay') {
            $orders = AdminStaticController::listData($sub7days);
        } elseif ($data == 'thangnay') {
            $orders = AdminStaticController::listData($lastmonth);
        } elseif ($data == 'thangtruoc') {
            $orders = AdminStaticController::listData($previousMonth);
        } else {
            $orders = AdminStaticController::listData($sub365days);
        }

        // Khởi tạo mảng $chart_data
        $chart_data = [];
        $total_profit = 0;
        $total_orders = 0;


        // Lặp qua từng đơn hàng và lưu vào mảng $chart_data
        foreach ($orders as $order) {
            $chart_data[] = [
                'created_at' => $order->created_at,
                'total_quantity_revenue' => $order->total_quantity_revenue,
                'total_price' => $order->total_price,
                'total_quantity_product' => $order->total_quantity_product,
            ];


            // Cộng dồn tổng lợi nhuận và tổng số đơn hàng
            $total_profit += $order->total_price;
            $total_orders++;
        }

        // Chuyển đổi mảng $chart_data thành JSON
        return response()->json(['chart_data' => $chart_data]);
    }
}
