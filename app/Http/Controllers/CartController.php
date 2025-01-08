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
        $variant = ProductVariant::find($variant_id);
        $cart = session('cart')?session('cart'):null;
        if(array_key_exists($variant_id,$cart->listProductVariants)==false){
            return response()->json([
                'sussess'=>false,
                'message'=>'giỏ hàng chưa có sản phẩm này!'
            ]);
        }
        if($cart==null)
            return response()->json([
                'sussess'=>false,
                'giỏ hàng chưa có sản phẩm!'
            ]);
        $cart->deleteItemCart($variant_id);
        if($cart->totalQuantity==0)
        {
            $request->session()->forget('cart');
            return response()->json([
                'sussess'=>true,
                'message'=> 'Đã xóa '.$variant->product->name.' ('.$variant->color.'/'.$variant->internal_memory.') khỏi giỏ hàng'
            ]);
        }
        else
            $request->session()->put('cart',$cart);
        return response()->json([
            'sussess'=>true,
            'message'=> 'Đã xóa '.$variant->product->name.' ('.$variant->color.'/'.$variant->internal_memory.') khỏi giỏ hàng',
            'cart'=>['totalQuantity'=>$cart->totalQuantity,'totalPrice'=>$cart->totalPrice]
        ]);
    }
    public function deleteAllItem(Request $request){
        if(session('cart')!=null)
        {
            $request->session()->forget('cart');
            return 'Đã xóa tất cả sản phẩm trong giỏ hàng!';
        }
        return 'giỏ hàng chưa có sản phẩm!';
    }
}
