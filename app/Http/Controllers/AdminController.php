<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }
    public function editWebsite(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'facebook' => 'required|url|max:255',
            'youtube' => 'required|url|max:255',
            'phone' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
        ]);
        $about = About::first();
        $about->name = $request->input('name');
        $about->facebook = $request->input('facebook');
        $about->youtube = $request->input('youtube');
        $about->phone = $request->input('phone');
        $about->email = $request->input('email');
        $about->address = $request->input('address');
        $about->save();
        return redirect()->back();
    }
    public function editLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $about = About::first();
            $about->logo = $filename;
            $about->save();
            return redirect()->back();
        }
    }
    public function profile()
    {
        return view('admin.pages.profile')->with('user', Auth::user());
    }
    public function editProfile(Request $request)
    {
        $request->validate(
            [
                'username' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('users')->ignore(Auth::user()->id),
                ],
                'fullname' => 'required|string|max:255',
                'phone' => [
                    'required',
                    'string',
                    'regex:/^[0-9]{10}$/',
                    Rule::unique('users')->ignore(Auth::user()->id),
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore(Auth::user()->id),
                ],
                'gender' => 'required|string',
                'birthday' => 'required|date',
            ],
            [
                'username.required' => 'Vui lòng nhập username',
                'username.max' => 'Username không được quá 50 ký tự',
                'username.unique' => 'Username đã tồn tại',
                'fullname.required' => 'Vui lòng nhập họ và tên',
                'fullname.max' => 'Họ và tên không được quá 255 ký tự',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập đúng định đạng email',
                'email.max' => 'Email không được quá 255 ký tự',
                'email.unique' => 'Email đã được sử dụng',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.unique' => 'Số điện thoại đã được sử dụng',
                'phone.regex' => 'Vui lòng nhập ký tự số ( 0 đến 9 ) không quá 10 kí tự',
            ]
        );
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
    public function editAvatar(Request $request)
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
    public function changepw()
    {
        return view('admin.pages.changepw')->with('user', Auth::user());
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
                'newPassword' => 'required|string
                |regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
                |regex:/^[a-zA-Z0-9@$!%*?&]+$/',
            ],
            [
                'oldpassword.required' => 'Vui lòng nhập password hiện tại',
                'newPassword.required' => 'Vui lòng nhập password mới',
                'newPassword.regex' => 'Password không chứa dấu phải có tối thiểu 8 kí tự bao gồm chữ hoa, chữ thường, kí tự số và kí tự đặt biệt'
            ]
        );
        if (Hash::check($request->oldpassword, Auth::user()->password)) {
            DB::table('users')
                ->where('id', Auth::id())
                ->update(['password' => Hash::make($request->newPassword)]);
            return response()->json(['success' => 'Mật khẩu đã được thay đổi thành công'], 200);
        }
    }
}
