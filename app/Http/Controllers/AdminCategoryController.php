<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
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
    public function store(Request $request)
    {
        $request->validate([
            'nameCategory' => 'required|string|max:255',
        ]);
        $slug = Str::slug($request->input('nameCategory'));

        // Tạo danh mục mới với slug
        Category::create([
            'name' => $request->input('nameCategory'),
            'slug' => $slug,
        ]);
        return redirect()->route('admin.category.addCategory')->with('msg', 'Thêm phân loại thành công');
    }
}
