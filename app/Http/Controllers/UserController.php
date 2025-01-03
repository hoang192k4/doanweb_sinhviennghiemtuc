<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        return view('user.pages.index');
    }

    public function TimKiemSanPhamFH($slug, $id = null)
    {
        $danhSachSanPham = Product::TimKiemSanPham($slug,$id);
        return view('user.pages.search')->with('danhSachSanPham',$danhSachSanPham);
    }
    public function GioiThieu(){
        return view('user.pages.blog');
    }
    public function LienHe(){
        return view('user.pages.contact');
    }
    public function GioHang(){
        return view('user.profile.shoppingcart');
    }
}
