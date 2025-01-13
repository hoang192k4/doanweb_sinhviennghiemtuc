<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;
use App\Models\VoucherUser;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

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

    public function addVoucher(Request $request){
        //kiểm tra mã code có tồn tại
        $voucher =  Voucher::where('code',$request->code)->first();
        if($voucher==null){
            return response()->json([
                'success'=>0,
                'message'=>'Mã code không tồn tại'
            ]);
        }else{
            //kiểm tra order đủ giá trị để sử dụng chưa
            if($voucher->min_order_value > $request->orderValue){
                return response()->json([
                    'success'=>0,
                    'message'=>'Giá trị đơn hàng không đủ để sử dụng voucher'
                ]);
            }else{
                //kiểm tra mã code đã đc sử dụng bởi người dùng chưa
                if(VoucherUser::where('voucher_id',$voucher->id)->where('user_id',Auth()->user()->id)->first())
                {
                    return response()->json([
                        'success'=>0,
                        'message'=>'Voucher đã được sử dụng!'
                    ]);
                }else{
                    return response()->json([
                        'success'=>1,
                        'message'=>'Áp dụng voucher thành công!',
                        'voucher'=>$voucher
                    ]);
                }
            }


        }
    }

    public function completePayment(Request $req){
        $validate = $req->validate(
            [
                'full_name'=>'required|string|max:255',
                'phone' => 'required|string|regex:/^[0-9]{10}$/',
                'email' => 'required|email|max:50',
                'address'=>'required|string|max:255',
                'provinces' => 'required|string', // Tỉnh/Thành bắt buộc
                'districts' => 'required|string', // Quận/Huyện bắt buộc
                'wards' => 'required|string', // Phường/Xã bắt buộc
            ],
            [
                'full_name.required' => 'Bạn chưa nhập họ và tên',
                'full_name.max' => 'Họ và tên không được quá 255 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định đạng email',
                'email.max' => 'Email không được quá 50 ký tự',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.regex' => 'Vui lòng nhập ký tự số ( 0 đến 9 ) không quá 10 kí tự',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'address.max' => 'Địa chỉ không được quá 255 ký tự',
                'provinces.required' => 'Vui lòng chọn tỉnh/thành.',
                'districts.required' => 'Vui lòng chọn quận/huyện.',
                'wards.required' => 'Vui lòng chọn phường/xã.',
            ]
        );
        //kiểm tra giá sản phẩm có bằng với lúc nhấn đặt hàng hay không
        foreach(session('cart')->listProductVariants as $item){
            $variant = ProductVariant::find($item['variant_info']->id);
            if($item['variant_info']->price != $variant->price){
                return response()->json([
                    'success' => 0,
                    'message'=> 'Giá của '.$variant->product->name.' ('.$variant->color.','.$variant->internal_memory.') đã thay đổi! Vui lòng đặt lại đơn!',
                    'url'=>route('user.shoppingcart')
                ]);
            }
        }

        if($req->voucher!=null){
            $voucher = Voucher::find($req->voucher);
            if(VoucherUser::where('user_id',Auth::user()->id)->where('voucher_id',$voucher->id)->first()!=null){
                return response()->json([
                    'success'=>0,
                    'message'=>'Voucher đã được sử dụng!'
                ]);
            }
            $discount = $voucher->discount_value;
            VoucherUser::create([
                'voucher_id'=>$voucher->id,
                'user_id'=>Auth::user()->id
            ]);
        }else
            $discount = 0;
        if($req->method=="COD")
            $methodId=1;
        else
            $methodId = 2;
        $order = Order::create([
            'order_code'=>Order::generateTimestamp(),
            'full_name'=>$req->full_name,
            'phone'=>$req->phone,
            'address'=>$req->address.', '.$req->wards.', '.$req->districts.', '.$req->provinces,
            'total_price'=>session('cart')->totalPrice - $discount,
            'payment_method'=>$methodId,
            'user_id'=>Auth::user()->id,
            'voucher_id'=> $req->voucher!=null? $voucher->id:null,
            'order_status_id'=>2
        ]);
        foreach(session('cart')->listProductVariants as $item){
            OrderItem::create([
                'product_variant_id'=>$item['variant_info']->id,
                'slug_product'=>$item['product_info']->slug,
                'name_product'=>$item['product_info']->name,
                'color'=>$item['variant_info']->color,
                'internal_memory'=>$item['variant_info']->internal_memory,
                'quantity'=>$item['quantity'],
                'price'=>$item['variant_info']->price,
                'total_price'=>$item['price'],
                'order_id'=>$order->id
            ]);
        }

        return response()->json([
            'success'=>1,
            'message'=>'Đặt hàng thành công!',
            'url'=>route('user.index')
        ]);
    }
}
