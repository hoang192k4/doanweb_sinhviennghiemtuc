<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;
class AdminProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        //
        $danhSachBienThe = ProductVariant::where('product_id',$product_id)->get();

        return view('admin.product.product_variant',['danhSachBienThe'=>$danhSachBienThe]);
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
        $validate = $request->validate([
            'color'=>'required',
            'stock'=>'required|min:0',
            'internal_memory'=>'required',
            'price'=>'required|min:0',
        ]);
        $variant = ProductVariant::find($id);

        if(isset($request->image)){
            $variant->update(['image'=>ProductVariant::uploadImageVariant($request->image)]);
        }
        $variant->update([
            'color'=>$request->color,
            'internal_memory'=>$request->internal_memory,
            'price'=>$request->price,
            'stock'=>$request->stock
        ]);
        return back()->with('msg','chỉnh sửa biến thể '.$id.' thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
