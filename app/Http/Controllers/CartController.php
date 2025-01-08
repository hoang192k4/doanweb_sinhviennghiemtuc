<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;

class CartController extends Controller
{
    //
    public function index()
    {
        return view('User.profile.shoppingcart');
    }

    public function addToCart(Request $request, string $variant_id, $quantity)
    {
        $variant = ProductVariant::find($variant_id);
        $product = $variant->product;
        $newCart = new Cart();
        if($variant!=null){
            $oldCart = session('cart')!=null?session('cart'):null;
            $newCart->setCart($oldCart);
            $newCart->addToCart($product,$variant,$quantity,$variant_id);
            $request->session()->put('cart',$newCart);
        }
        return view('User.profile.shoppingcart',['cart'=>$newCart]);
    }
}
