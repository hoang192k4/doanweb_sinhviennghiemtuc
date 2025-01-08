<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    //
    public function index()
    {
        $danhSachDanhMuc = Category::all();
        return view('admin.category.category')->with('danhSachDanhMuc', $danhSachDanhMuc);
    }
    public function addCategory()
    {
        return view('admin.category.addcategory');
    }
    public function store() {}
}
