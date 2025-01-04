<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function hienThiDanhSachDonHang(){
        $chuanBiDonHangs=Order::where('order_status_id',3)->get();// status 3 đang chuẩn đơn hàng
        $vanChuyenDonHangs=Order::where('order_status_id',4)->get();// status 4 đơn hàng giao cho đơn vị vận chuyển
        $giaoHangThanhCong=Order::where('order_status_id',6)->get();// status 6 đơn hàng đã giao thành công
        $huyDonHang=Order::where('order_status_id',7)->get();// status 7 đơn hàng đã hủy
        $traHang=Order::where('order_status_id',8)->get();//status 8 đơn hàng đã trả và hoàn tiền
        return view('admin.pages.order')->with('chuanBiDonHangs', $chuanBiDonHangs, 
        'vanChuyenDoHangs', $vanChuyenDonHangs, 
        'giaoHangThanhCong',$giaoHangThanhCong);
    }
    public function updateChuanBi($id)
    {
        $order = Order::find($id);
        $order->order_status_id = 5;
        $order->save();
        return response()->json(['message' => 'Cập nhật đơn hàng thành công.']);
    }
    public function updateVanChuyen($id)
    {
        $order = Order::find($id);
        $order->order_status_id = 6;
        $order->save();
        return response()->json(['message' => 'Cập nhật đơn hàng thành công.']);
    }
}
