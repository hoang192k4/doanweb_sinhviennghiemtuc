<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function updateChuanBi($id)
    {
        $order = Order::find($id);
        $order->order_status_id = 5;
        $order->save();
        return redirect()->back();
    }
    public function updateVanChuyen($id)
    {
        $order = Order::find($id);
        $order->order_status_id = 6;
        $order->save();
        return redirect()->back();
    }
}
