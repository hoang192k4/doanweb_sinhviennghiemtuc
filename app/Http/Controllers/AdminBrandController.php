<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class AdminBrandController extends Controller
{

    //trang index
    public function getListBrand()
    {
        //
        $danhSachThuongHieu = Brand::where('status', 1)->paginate(5);
        $danhSachDanhMucLoc = Category::all();
        $danhSachDanhMuc = Category::all();

        return view('admin.category.category')
            ->with('danhSachThuongHieu', $danhSachThuongHieu)
            ->with('danhSachDanhMucLoc', $danhSachDanhMucLoc)
            ->with('danhSachDanhMuc', $danhSachDanhMuc);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    //chuyển trang thêm thương hiệu
    public function addBrand()
    {
        $danhSachDanhMuc = Category::where('status', 1)->get();
        return view('admin.category.addbrand')->with('danhSachDanhMuc', $danhSachDanhMuc);
    }

    //lưu thương hiệu
    public function storeBrand(Request $request)
    {
        $danhSachDanhMuc = Category::where('status', 1)->get();

        $validate = $request->validate([
            'nameBrand' => 'required|unique:brands,name,',
            'nameBrand' => 'required|unique:brands,name|max:255',
            'imageBrand' => 'required',
        ], [
            'nameBrand.required' => 'Vui lòng nhập tên thương hiệu',
            'nameBrand.unique' => 'Tên thương hiệu đã tồn tại',
            'nameBrand.max' => 'Tên thương hiệu quá 255 ký tự',
            'imageBrand.required' => 'Vui lòng chọn ảnh',
        ]);

        Brand::create([
            'name' => $request->input('nameBrand'),
            'image' => $request->input('imageBrand'),
            'category_id' => $request->input('nameCategory'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.category.addbrand')
            ->with('message', 'Thêm thương hiệu thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {}

    //tìm và chuyển trang
    public function editBrand(string $id)
    {
        $thuongHieuTimKiem = Brand::find($id);
        $danhSachDanhMuc = Category::all();
        return view('admin.category.editbrand')
            ->with('thuongHieuTimKiem', $thuongHieuTimKiem)
            ->with('danhSachDanhMuc', $danhSachDanhMuc);
    }

    //Cập nhật
    public function updateBrand(Request $request, string $id)
    {
        $validate = $request->validate([
            'nameBrand' => 'required|unique:brands,name,' . $id,
            'imageBrand' => 'required',
            'nameBrand' => 'required|unique:brands,name|max:255',
        ], [
            'nameBrand.required' => 'Vui lòng nhập tên thương hiệu',
            'nameBrand.unique' => 'Tên thương hiệu đã tồn tại',
            'nameBrand.max' => 'Tên thương hiệu quá 255 ký tự',
            'imageBrand' => 'Vui lòng chọn ảnh',
        ]);

        $nameBrand = $request->input('nameBrand');
        $nameCategory = $request->input('nameCategory');
        $status = $request->input('status');
        $imageBrand = $request->input('imageBrand');

        Brand::where('id', $id)->update([
            'name' => $nameBrand,
            'category_id' => $nameCategory,
            'status' => $status,
            'image' => $imageBrand,
        ]);
        return redirect()->route('admin.category.editbrand', ['id' => $id])->with('message', 'Cập nhật thương hiệu thành công');
    }

    //xóa thương hiệu
    public function deleteBrand($id)
    {
        $thuongHieuTimKiem = Brand::find($id);
        if ($thuongHieuTimKiem) {
            Product::where('brand_id', $thuongHieuTimKiem->id)->update(['status' => 0]);

            $thuongHieuTimKiem->update(['status' => 0]);
            return response()->json(['message' => 'Xóa thương hiệu thành công.'], 200);
        }
        return response()->json(['message' => 'Thương hiệu không tồn tại.'], 404);
    }

    //tìm kiếm thương hiệu
    public function searchBrand(Request $request)
    {
        $keyBrand = $request->input('keySearchBrand');
        $keyBrand = str_replace('$', '', $keyBrand);
        $danhSachDanhMucLoc = Category::where('status', 1)->get();

        $danhSachThuongHieu = Brand::where('name', 'like', '%' . $keyBrand . '%')->where('status', 1)->paginate(8);

        if ($danhSachThuongHieu->isEmpty()) {
            return view('admin.category.category')
                ->with('message', 'Không tìm thấy danh mục nào.')
                ->with('danhSachThuongHieu', $danhSachThuongHieu)
                ->with('danhSachDanhMucLoc', $danhSachDanhMucLoc);
        }

        return view('admin.category.category')
            ->with('danhSachThuongHieu', $danhSachThuongHieu)
            ->with('danhSachDanhMucLoc', $danhSachDanhMucLoc);
    }
}
