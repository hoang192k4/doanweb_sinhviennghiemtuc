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
    public function searchCategory(Request $request)
    {
        $keyCategory = $request->input('keySearchCategory');
        $danhSachDanhMuc = Category::where('name', 'like', '%' . $keyCategory . '%')->get();

        if ($danhSachDanhMuc->isEmpty()) {
            return view('admin.category.category')->with('message', 'Không tìm thấy danh mục nào.');
        }

        return view('admin.category.category')->with('danhSachDanhMuc', $danhSachDanhMuc);
    }
}
