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
        if($variant==null)
            return 'sản phẩm không tồn tại!';
        $product = $variant->product;
        $newCart = new Cart();
        if($variant!=null){
            $oldCart = session('cart')!=null?session('cart'):null;
            $newCart->setCart($oldCart);
            $newCart->addToCart($product,$variant,$quantity,$variant_id);
            $request->session()->put('cart',$newCart);
        }
        return 'Đã thêm sản phẩm '.$product->name.' ('.$variant->color.'/'.$variant->internal_memory.') vào giỏ hàng';
    }

    public function deleteItemCart(Request $request, string $variant_id)
    {
        $cart = session('cart')?session('cart'):null;
        if($cart==null)
            return 'giỏ hàng chưa có sản phẩm!';
        $cart->deleteItemCart($variant_id);
        if($cart->totalQuantity==0)
            $request->session()->forget('cart');
        else
            $request->session()->put('cart',$cart);
        return 'Đã xóa '.$product->name.' ('.$variant->color.'/'.$variant->internal_memory.') khỏi giỏ hàng';
    }
}
