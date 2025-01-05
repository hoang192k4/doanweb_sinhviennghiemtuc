<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\Product;
class AdminProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        //
        $danhSachBienThe = ProductVariant::with('product')->where('product_id',$product_id)->where('status',1)->get();
        return view('admin.product.product_variant',['danhSachBienThe'=>$danhSachBienThe]);
    }
    public function showListVariantsHide($product_id){
        $product = Product::find($product_id);
        $danhSachBienThe = ProductVariant::with('product')->where('product_id',$product_id)->where('status',0)->get();
        return view('admin.product.product_variant_hide',['danhSachBienThe'=>$danhSachBienThe,'product'=>$product]);
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
        $variant = ProductVariant::create([
            'color'=>$request->color,
            'stock'=>$request->stock,
            'internal_memory'=>$request->internal_memory,
            'price'=>$request->price,
            'image'=>'default.jpg',
            'product_id'=>$request->product_id,
        ]);
        return $variant;
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
        ProductVariant::where('id',$id)->update(['status'=>0]);
        return 'Ẩn variant '.$id.' thành công!';
    }

    public function active(string $id)
    {
        ProductVariant::where('id',$id)->update(['status'=>1]);
        return 'Hiển thị variant '.$id.' thành công!';
    }
}
