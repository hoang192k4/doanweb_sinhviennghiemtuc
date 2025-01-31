<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index(){
        return view('admin.pages.order');
    }
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


    public function cancelOrder($id){
        Order::where('id',$id)->update(['order_status_id'=>7]);//status=7 đơn hàng đã huy
        return redirect()->route('order.cancel');
    }
    public function deleteOrder($id){
        $order = Order::find($id);

        if(!$order){
            return response()->json(['message' => 'Không tim thấy đơn hàng'], 404);
        }
        if($order->order_status_id !=[4,5,6] || $order->payment_method==2){
            $order = Order::where('id',$id)->update(['order_status_id'=>9]);//status =9 ẩn đơn hàng
            return response()->json(['message' => 'Ẩn đơn hàng thành công.']);
        }
        return view('admin.pages.order');

    }
}
