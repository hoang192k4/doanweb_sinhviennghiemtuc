<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function index()
    {
        return view('User.profile.shoppingcart');
    }

    public function addToCart()
    {
        
    }
}
