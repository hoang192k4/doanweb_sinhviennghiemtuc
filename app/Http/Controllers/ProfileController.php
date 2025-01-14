<?php

namespace App\Http\Controllers;

use App\Models\LikeProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.profile')->with('user', Auth::user());
    }
    public function editInfo(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:10',
            'gender' => 'required|string',
            'birthday' => 'required|date',
        ]);
        $user = Auth::user();
        $user->username = $request->input('username');
        $user->full_name = $request->input('fullname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender') == 'male' ? 'Nam' : 'Nữ';
        $user->date_of_birth = $request->input('birthday');
        $user->save();
        return redirect()->back();
    }
    public function editImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'image.' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
            return redirect()->back();
        }
    }
    public function order_history()
    {
        return view('user.profile.order_history')->with([
            'orders'=> Order::where('user_id', Auth::user()->id)->get(),
        ]);
    }
    public function cancel($id)
    {
        $order = Order::where('user_id', Auth::user()->id)->find($id);
        if ($order){
            $order->order_status_id = 7;
            $order->save();
        }
        return redirect()->back();
    }
    public function favourite_product()
    {
        return view('user.profile.favourite_product')->with('products', Product::whereIn('id', LikeProduct::where('user_id', Auth::user()->id)->pluck('product_id'))->get());
    }
    public function unLike($id)
    {
        $like = LikeProduct::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        if ($like)
            $like->delete();
        return redirect()->back();
    }
    public function review_history()
    {
        return view('user.profile.review_history')->with('reviews', Rating::where('user_id', Auth::user()->id)->get());
    }
    public function ChangePwd()
    {
        return view('user.profile.changepassword');
    }
    public function IsPasswordChange(Request $request)
    {
        if (!Hash::check($request->oldpassword, Auth::user()->password)) {
            return response()->json(['error' => 'Mật khẩu hiện tại không đúng'], 401);
        }
        return response()->json(['success' => 'Mật khẩu hiện tại chính xác'], 200);
    }
    public function UpdatePassword(Request $request)
    {
        $request->validate(
            [
                'oldpassword' => 'required|string',
                'newPassword' => 'required|string',
            ],
            [
                'oldpassword.required' => 'Bạn chưa nhập password hiện tại',
                'newPassword.required' => 'Bạn chưa nhập password mới'
            ]
        );
        if (Hash::check($request->oldpassword, Auth::user()->password)) {
            DB::table('users')
                ->where('id', Auth::id())  // Điều kiện tìm người dùng hiện tại
                ->update(['password' => Hash::make($request->newPassword)]);
            return response()->json(['success' => 'Mật khẩu đã được thay đổi thành công'], 200);
        }
    }
}
