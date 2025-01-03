<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function blogList()
    {
        $danhSachBaiViet = Blog::paginate(4);
        return view('user.pages.blog')->with('danhSachBaiViet', $danhSachBaiViet);
    }
}