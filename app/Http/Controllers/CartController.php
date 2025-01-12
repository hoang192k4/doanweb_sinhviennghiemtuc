<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;

class CartController extends Controller
{
    //
    public function index(Request $request)
    {
        $cart = session('cart')?session('cart'):null;
        if($cart!=null)
        {
            //kiểm tra lại các sp trong giỏ, nếu sp có trong giỏ so với db có status là 0 thì xóa sp khỏi giỏ
            foreach($cart->listProductVariants as $item){
                $var = ProductVariant::find($item['variant_info']->id);
                if($var->status==0)
                {
                    $cart->deleteItemCart($var->id);
                    if($cart->totalQuantity==0)
                        $request->session()->forget('cart');
                    else
                        $request->session('cart')->put('cart',$cart);
                }
            }
        }
        return view('User.profile.shoppingcart');
    }

    public function addToCart(Request $request, string $variant_id, $quantity)
    {
        $variant = ProductVariant::where('status',1)->find($variant_id);
        if($variant==null)
            return 'sản phẩm không tồn tại!';
        $product = $variant->product;
        $newCart = new Cart();

        if($variant!=null){
            $oldCart = session('cart')!=null?session('cart'):null;
            $newCart->setCart($oldCart);

            if($newCart->addToCart($product,$variant,$quantity,$variant_id)==false){
                return response()->json([
                    'success'=>0,
                    'message' =>'Số lượng bạn chọn đã vượt quá giới hạn số lượng của sản phẩm này!',
                    'cart'=>['totalQuantity'=>$newCart->totalQuantity,'totalPrice'=>$newCart->totalPrice,'listProductVariants'=>$newCart->listProductVariants]
                ]);
            }
            $request->session()->put('cart',$newCart);
        }
        return response()->json([
            'success'=>true,
            'message'=>'Đã thêm sản phẩm '.$product->name.' ('.$variant->color.'/'.$variant->internal_memory.') vào giỏ hàng',
            'cart'=>['totalQuantity'=>$newCart->totalQuantity,'totalPrice'=>$newCart->totalPrice,'listProductVariants'=>$newCart->listProductVariants]
        ]);
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

    public function minusOnQuantity(Request $request, $variant_id)
    {
        $cart = session('cart')?session('cart'):null;
        if($cart==null)
            return 'giỏ hàng chưa có sản phẩm!';
        if(array_key_exists($variant_id,$cart->listProductVariants)==false){
                return response()->json([
                    'sussess'=>false,
                    'message'=>'giỏ hàng chưa có sản phẩm này!'
                ]);
            }
        $cart->minusOnQuantity($variant_id);
        $request->session()->put('cart',$cart);
        return response()->json([
            'success'=>true,
            'cart'=>['totalQuantity'=>$cart->totalQuantity,'totalPrice'=>$cart->totalPrice]
        ]);

    }
}
