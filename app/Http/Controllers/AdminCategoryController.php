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
        return view('admin.category.category')
            ->with('danhSachDanhMuc', $danhSachDanhMuc)
            ->with('danhSachDanhMucLoc', $danhSachDanhMucLoc);
    }

    //chuyển hướng trang thêm danh mục
    public function addCategory()
    {
        $danhSachDanhMuc = Category::all();
        return view('admin.category.addcategory')->with('danhSachDanhMuc', $danhSachDanhMuc);
    }
    //lưu trữ danh mục
    public function store(Request $request)
    {
        $nameCategory = $request->input('nameCategory');
        $request->validate([
            'nameCategory' => 'required|string|max:255',
            'nameSpecifications' => 'required|array',
            'nameSpecifications.*' => 'required|string|max:255',
        ]);
        $slug = Str::slug($nameCategory);

        $category = Category::create([
            'name' => $nameCategory,
            'slug' => $slug,
            'status' => 1,
        ]);
        foreach ($request->input('nameSpecifications') as $specification) {
            CategorySpecification::create([
                'name' => $specification,
                'category_id' => $category->id,
            ]);
        }
        return redirect()->route('admin.category.addCategory')
            ->with('msg', 'Thêm phân loại thành công');
    }
    //tìm kiếm danh mục
    public function searchCategory(Request $request)
    {
        $keyCategory = $request->input('keySearchCategory');

        $danhSachDanhMuc = Category::where('categories.name', 'like', '%' . $keyCategory . '%')
            ->join('category_specifications', 'categories.id', '=', 'category_specifications.category_id')
            ->select('category_specifications.*', 'category_specifications.name as specification_name')
            ->get();
        $danhSachDanhMucLoc = Category::all();

        if ($danhSachDanhMuc->isEmpty()) {
            return view('admin.category.category')
                ->with('message', 'Không tìm thấy danh mục nào.')
                ->with('danhSachDanhMuc', $danhSachDanhMuc)
                ->with('danhSachDanhMucLoc', $danhSachDanhMucLoc);
        }

        return view('admin.category.category')
            ->with('danhSachDanhMuc', $danhSachDanhMuc)
            ->with('danhSachDanhMucLoc', $danhSachDanhMucLoc);
    }
    //tìm id và chuyển trang sửa danh mục
    public function editCategory($id)
    {
        $danhMucTimKiem = Category::find($id);
        $thongSoKyThuat = $danhMucTimKiem->category_specifications;
        return view('admin.category.editcategory')
            ->with('danhMucTimKiem', $danhMucTimKiem)
            ->with('thongSoKyThuat', $thongSoKyThuat);
    }

    //cập nhật danh mục
    public function updateCategory(Request $request, $id)
    {
        $nameCategory = $request->input('nameCategory');
        $status = $request->input('status');
        $slug = Str::slug($request->input('nameCategory'));
        Category::where('id', $id)->update([
            'name' => $nameCategory,
            'slug' => $slug,
            'status' => $status
        ]);

        return redirect()->route('admin.category.editcategory');
    }

    public function loadCategorySpecification($category)
    {
        return CategorySpecification::where('category_id', $category)->get();
    }

    //lọc theo tên danh mục
    public function filterCategory(Request $request)
    {
        $categoryId = $request->input('categoryFilter', 'all');

        if ($categoryId == 'all') {
            $danhSachDanhMuc = CategorySpecification::all();
        } else {
            $danhSachDanhMuc = CategorySpecification::where('category_id', $categoryId)->get();
        }

        return response()->json($danhSachDanhMuc);
    }

    //xóa danh mục
    public function deleteCategory($id)
    {
        $danhMucTimKiem = Category::find($id);
        if ($danhMucTimKiem) {
            $danhMucTimKiem->update(['status' => 0]);
            return response()->json(['message' => 'Xóa danh mục thành công.'], 200);
        }
        return response()->json(['message' => 'Danh mục không tồn tại.'], 404);
    }
}
