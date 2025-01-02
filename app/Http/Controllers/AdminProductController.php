<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $danhSachSanPham = Product::where('status',1)->get();

        return view('admin.product.product',['danhSachSanPham'=>$danhSachSanPham]);
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
        //
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

    public function search(Request $request){

        $validate = $request->validate([
            'key' => 'required'
        ]);
        $danhSachSanPhamDaTimKiem = Product::where('name','like','%'.$request->input('key').'%')
                                            ->where('status',1)
                                            ->get();
        return view('admin.product.product',['danhSachSanPham'=>$danhSachSanPhamDaTimKiem]);
    }
}
