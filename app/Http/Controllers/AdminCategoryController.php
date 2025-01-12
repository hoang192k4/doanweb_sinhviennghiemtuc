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
        $danhSachDanhMucLoc = Category::all();
        if ($danhSachDanhMuc->isEmpty()) {
            return view('admin.category.category')->with('message', 'Không tìm thấy danh mục nào.');
        }
        return view('admin.category.category')->with('danhSachDanhMuc', $danhSachDanhMuc)->with('danhSachDanhMucLoc', $danhSachDanhMucLoc);
    }
    public function addCategory()
    {
        return view('admin.category.addcategory');
    }
    public function store(Request $request)
    {
        $nameCategory = $request->input('nameCategory');
        $request->validate([
            'nameCategory' => 'required|string|max:255',
            'nameSpecifications' => 'required|array',
            'nameSpecifications.*' => 'required|string|max:255',
        ]);
        $slug = Str::slug($nameCategory);

        // Tạo danh mục mới với slug
        $category = Category::create([
            'name' => $nameCategory,
            'slug' => $slug,
        ]);
        foreach ($request->input('nameSpecifications') as $specification) {
            CategorySpecification::create([
                'name' => $specification,
                'category_id' => $category->id,
            ]);
        }
        return redirect()->route('admin.category.addCategory')->with('msg', 'Thêm phân loại thành công');
    }
    public function searchCategory(Request $request)
    {
        $keyCategory = $request->input('keySearchCategory');

        $danhSachDanhMuc = Category::where('name', 'like', '%' . $keyCategory . '%')->get();

        if ($danhSachDanhMuc->isEmpty()) {
            return view('admin.category.category')->with('message', 'Không tìm thấy danh mục nào.')->with('danhSachDanhMuc', $danhSachDanhMuc);
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
    public function filterCategory(Request $request)
    {
        $danhSachDanhMucLoc = Category::all();
        $id = $request->input('categoryFilter');
        if ($id == 'all') {
            $danhSachDanhMuc = Category::all();
        } else {
            $danhSachDanhMuc = Category::where('id', $id)->get();
        }
        return view('admin.category.category')->with('danhSachDanhMuc', $danhSachDanhMuc)->with('danhSachDanhMucLoc', $danhSachDanhMucLoc);
    }
}
