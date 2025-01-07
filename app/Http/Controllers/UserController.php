<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\ProductUser;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $thuongHieu = Brand::index();
        $danhSachDTHot = ProductUser::LayThongTinSanPham('Điện Thoại');
        $danhSachLapTopMoi = ProductUser::LayThongTinSanPham('Laptop');
        return View('User.pages.index')->with([
            "thuongHieu" => $thuongHieu,
            "danhSachDTHot" => $danhSachDTHot,
            "danhSachLapTopMoi" => $danhSachLapTopMoi
        ]);
    }
    public function TimKiemSanPhamFH($slug, $id = null)
    {
        $danhSachSanPham = ProductUser::TimKiemSanPham($slug, $id);
        return view('user.pages.search')->with('danhSachSanPham', $danhSachSanPham);
    }
    public function TimKiemTheoTuKhoa(Request $request)
    {
        $key = $request->input('seachbykey');
        $danhSachSanPham = ProductUser::TimKiemTheoTuKhoa($key);
        return view('user.pages.search')->with('danhSachSanPham', $danhSachSanPham);
    }


    //Trang Giới Thiệu
    public function GioiThieu()
    {
        $danhSachBaiViet = Blog::layTatCaBaiViet();
        return view('user.pages.blog')->with('danhSachBaiViet', $danhSachBaiViet);
    }
    public function timKiemBaiVietTheoTuKhoa(Request $request)
    {
        $key = $request->input('keyBlog');
        $danhSachBaiViet = Blog::timKiemBaiViet($key);
        return view('user.pages.blog')->with('danhSachBaiViet', $danhSachBaiViet);
    }

    //Trang Liên Hệ
    public function LienHe()
    {
        return view('user.pages.contact');
    }
    public function GioHang()
    {
        return view('user.profile.shoppingcart');
    }

    public function DangKy(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|string|max:50|unique:users,username',
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|regex:/^[0-9]{10}$/|unique:users,phone',
                'email_register' => 'required|email|max:255|unique:users,email',
                'password_register' => 'required|string'
            ],
            [
                'username.required' => 'Bạn chưa nhập username',
                'username.max' => 'Username không được quá 50 ký tự',
                'username.unique' => 'Username đã tồn tại',
                'full_name.required' => 'Bạn chưa nhập họ và tên',
                'full_name.max' => 'Họ và tên không được quá 255 ký tự',
                'email_register.required' => 'Bạn chưa nhập email',
                'email_register.email' => 'Bạn chưa nhập đúng định đạng email',
                'email_register.max' => 'Email không được quá 255 ký tự',
                'email_register.unique' => 'Email đã được sử dụng',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.unique' => 'Số điện thoại đã được sử dụng',
                'phone.regex' => 'Vui lòng nhập ký tự số ( 0 đến 9 ) không quá 10 kí tự',
                'password_register.required' => 'Bạn chưa nhập password',
            ]
        );
        DB::table('users')->insert([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'gender' => 'Nam',
            'date_of_birth' => now(),
            'image' => '',
            'phone' => $request->phone,
            'email' => $request->email_register,
            'password' => Hash::make($request->password_register),
            'status' => 1
        ]);
        return response()->json(['message' => 'Đăng ký thành công']);
    }
}
