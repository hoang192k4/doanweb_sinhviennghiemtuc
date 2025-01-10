<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function index()
    {
        //hiển thị các sản phẩm trong giỏ hàng
        if(session('cart')==null)
            return redirect()->route('user.index');
        return view('User.profile.payment');
    }

    public function completePayment(Request $req){
        $validate = $req->validate(
            [
                'full_name'=>'required|string|max:255',
                'phone' => 'required|string|regex:/^[0-9]{10}$/',
                'email' => 'required|email|max:50',
            ],
            [
                'full_name.required' => 'Bạn chưa nhập họ và tên',
                'full_name.max' => 'Họ và tên không được quá 255 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định đạng email',
                'email.max' => 'Email không được quá 50 ký tự',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.regex' => 'Vui lòng nhập ký tự số ( 0 đến 9 ) không quá 10 kí tự',
            ]
        );
        $orderPayment =new Order();
        $validated['order_code'] = Order::generateOrderCode();
        $orderPayment->id=$req['id'];
        $orderPayment->full_name=$req['full_name'];
        $orderPayment->phone=$req['phone'];
        $orderPayment->email=$req['email'];
        $orderpayment->save();
        return view('User.profile.payment')->witj('orderPayment',$orderPayment);

    }
}
