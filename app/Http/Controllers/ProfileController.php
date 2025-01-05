<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.profile')->with('user', User::first());
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
        $user = User::first();
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
            $user = User::first();
            $user->image = $filename;
            $user->save();
            return redirect()->back();
        }
    }
    public function order_history()
    {
        return view('user.profile.order_history')->with('orders', Order::where('user_id', 3)->get());
    }
}
