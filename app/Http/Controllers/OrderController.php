<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
