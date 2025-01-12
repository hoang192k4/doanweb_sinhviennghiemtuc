<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategorySpecification;

class AdminCategoryController extends Controller
{
    //
    public function index()
    {
        $danhSachDanhMuc = Category::all();
        if ($danhSachDanhMuc->isEmpty()) {
            return view('admin.category.category')->with('message', 'Không tìm thấy danh mục nào.');
        }
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
        $categoryFilter = $request->input('categoryFilter');

        $danhSachDanhMuc = Category::where('name', 'like', '%' . $keyCategory . '%')->get();

        if ($categoryFilter === 'all') {
            $danhSachDanhMuc = Category::all();
        } else {
            $danhSachDanhMuc = Category::where('id', $categoryFilter)->get();
        }

        if ($danhSachDanhMuc->isEmpty()) {
            return view('admin.category.category')->with('message', 'Không tìm thấy danh mục nào.');
        }

        return view('admin.category.category')->with('danhSachDanhMuc', $danhSachDanhMuc);
    }
    public function editCategory($id)
    {
        $danhMucTimKiem = Category::find($id);
        return view('admin.category.editcategory')->with('danhMucTimKiem', $danhMucTimKiem);
    }
    public function updateCategory(Request $request, $id)
    {
        $khoaTimKiem = Category::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $nameCategory = $request->input('nameCategory');
        $status = $request->input('status');
        $slug = Str::slug($request->input('nameCategory'));
        dd($nameCategory);
        dd($status);

        Category::where('id', $khoaTimKiem)->update([
            'name' => $nameCategory,
            'slug' => $slug,
            'status' => $status
        ]);
        return redirect()->route('admin.category.editcategory');
    }


    public function loadCategorySpecification($category){
        return CategorySpecification::where('category_id',$category)->get();
    }
}
