<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\CategorySpecification;

class AdminCategoryController extends Controller
{
    //chuyển hướng trang thêm danh mục
    public function addCategory()
    {
        $danhSachDanhMuc = Category::where('status', 1)->get();
        return view('admin.category.addcategory')->with('danhSachDanhMuc', $danhSachDanhMuc);
    }
    // lưu trữ danh mục
    public function storeCategory(Request $request)
    {
        $validate = $request->validate([
            'nameCategory' => 'required|unique:categories,name|max:255',
            'nameSpecifications' => 'required|unique:category_specifications,name|max:255',
        ], [
            'nameCategory.required' => 'Vui lòng nhập tên danh mục',
            'nameCategory.unique' => 'Tên danh mục đã tồn tại',
            'nameCategory.max' => 'Tên danh mục quá 255 ký tự',
            'nameSpecifications.required' => 'Vui lòng nhập thông số',
            'nameSpecifications.unique' => 'Tên thông số đã tồn tại',
            'nameSpecifications.max' => 'Tên danh mục quá 255 ký tự',
        ]);

        $nameCategory = $request->input('nameCategory');
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

        return redirect()->route('admin.category.addcategory')
            ->with('message', 'Thêm phân loại thành công');
    }

    //tìm id và chuyển trang sửa danh mục
    public function editCategory(string $id)
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

        return redirect()->route('admin.category.editcategory', ['id' => $id])
            ->with('message', 'Thêm phân loại thành công');;
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
            $danhSachDanhMuc = Brand::where('status', 1)->get();
        } else {
            $danhSachDanhMuc = Brand::where('category_id', $categoryId)->get();
        }

        return response()->json($danhSachDanhMuc);
    }

    //xóa danh mục
    public function deleteCategory($id)
    {
        $danhMucTimKiem = Category::find($id);
        if ($danhMucTimKiem) {
            Product::where('brand_id', $danhMucTimKiem->id)->update(['status' => 0]);
            $danhMucTimKiem->update(['status' => 0]);
            return response()->json(['message' => 'Xóa danh mục thành công.'], 200);
        }
        return response()->json(['message' => 'Danh mục không tồn tại.'], 404);
    }
}
