<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getListBrand()
    {
        //
        $danhSachThuongHieu = Brand::where('status', 1)->get();
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

    /**
     * Store a newly created resource in storage.
     */
    public function addBrand()
    {
        $danhSachDanhMuc = Category::where('status', 1)->get();
        return view('admin.category.addbrand')->with('danhSachDanhMuc', $danhSachDanhMuc);
    }

    public function storeBrand(Request $request)
    {
        $danhSachDanhMuc = Category::where('status', 1)->get();

        $validate = $request->validate([
            'nameBrand' => 'required|unique:brands,name,',
            'imageBrand' => 'required',
        ], [
            'nameBrand.required' => 'Vui lòng nhập tên thương hiệu',
            'nameBrand.unique' => 'Tên thương hiệu đã tồn tại',
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

    /**
     * Show the form for editing the specified resource.
     */
    public function editBrand(string $id)
    {
        $thuongHieuTimKiem = Brand::find($id);
        $danhSachDanhMuc = Category::all();
        return view('admin.category.editbrand')
            ->with('thuongHieuTimKiem', $thuongHieuTimKiem)
            ->with('danhSachDanhMuc', $danhSachDanhMuc);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBrand(Request $request, string $id)
    {
        $validate = $request->validate([
            'nameBrand' => 'required|unique:brands,name,' . $id,
            'imageBrand' => 'required',
        ], [
            'nameBrand.required' => 'Vui lòng nhập tên thương hiệu',
            'nameBrand.unique' => 'Tên thương hiệu đã tồn tại',
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

    /**
     * Remove the specified resource from storage.
     */
    public function deleteBrand($id)
    {
        $thuongHieuTimKiem = Brand::find($id);
        if ($thuongHieuTimKiem) {
            $thuongHieuTimKiem->update(['status' => 0]);
            return response()->json(['message' => 'Xóa thương hiệu thành công.'], 200);
        }
        return response()->json(['message' => 'Thương hiệu không tồn tại.'], 404);
    }
    public function filter(Request $request, string $opt)
    {
        $brands = Brand::filter($opt);
        return $brands;
    }
}
