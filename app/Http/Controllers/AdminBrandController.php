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
    public function index()
    {
        //
        $danhSachTenDanhMuc = Category::all();
        return view('admin.category.addbrand')->with('danhSachTenDanhMuc', $danhSachTenDanhMuc);
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
    public function store(Request $request)
    {
        // Brand::create([
        //     'name' => $request->input('nameBrand'),
        //     'image' => $request->input('imageBrand'),
        //     'category_id' => $request->input('nameCategory'),
        //     'status' => $request->input('status'),
        // ]);
        $data = ([
            'name' => $request->input('nameBrand'),
            'image' => $request->input('imageBrand'),
            'category_id' => $request->input('nameCategory'),
            'status' => $request->input('status'),
        ]);
        dd($data);

        return redirect()->route('admin.addbrand.index')->with('msg', 'Thêm thương hiệu thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function filter(Request $request, string $opt)
    {
        $brands = Brand::filter($opt);
        return $brands;
    }
}
