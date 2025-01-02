<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ImageProduct;

use App\Models\ProductSpecification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        $danhSachPhanLoai = Category::where('status',1)->get();
        $danhSachThuongHieu = Brand::where('status',1)->get();
        return view('admin.product.addproduct',['danhSachPhanLoai'=>$danhSachPhanLoai,'danhSachThuongHieu'=>$danhSachThuongHieu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required|unique:products|max:255',
            'description'=>'required',
            'image'=>'required',
            'display'=>'required',
            'technic_screen'=>'required',
            'resolution'=>'required',
            'chipset'=>'required',
            'os'=>'required',
            'ram'=>'required',
            'size'=>'required',
            'launch_time'=>'required',
            'camera'=>'required',
            'variants.*.color'=>'required',
            'variants.*.stock'=>'required',
            'variants.*.internal_memory'=>'required',
            'variants.*.price'=>'required',
            'variants.*.image'=>'required'
        ],[
            'name.required'=> 'Vui lòng nhập tên sản phẩm!',
            'name.unique'=>'Tên sản phẩm đã tồn tại!',
            'description.required'=>'Vui lòng nhập mô tả!',
            'image.required'=>'Vui lòng thêm hình ảnh!',
        ]);

        // //thêm sản phẩm
        // $product = Product::create([
        //     'name'=>$request->input('name'),
        //     'slug'=>Str::slug($request->input('name')),
        //     'description'=>$request->input('description'),
        //     'brand_id'=>$request->input('brand'),
        //     'category_id'=>$request->input('category')
        // ]);
        // //thêm hình ảnh sản phẩm từ id sản phẩm ở $product
        // if($request->has('image'))
        // {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $fileName = 'product_'.time().'.'.$extension;
        //     $request->image->move(public_path('images'), $fileName);
        //     ImageProduct::create([
        //         'image'=>'images/'.$fileName,
        //         'product_id'=> $product->id
        //     ]);
        // }
        // //thêm thông số kĩ thuật cho sản phẩm từ id của $product
        // ProductSpecification::create([
        //     'display'=>$request->input('display'),
        //     'technic_screen'=>$request->input('technic_screen'),
        //     'resolution'=>$request->input('resolution'),
        //     'chipset'=>$request->input('chipset'),
        //     'ram'=>$request->input('ram'),
        //     'camera'=>$request->input('camera'),
        //     'operating_system'=>$request->input('os'),
        //     'size'=>$request->input('size'),
        //     'launch_time'=>$request->input('launch_time'),
        //     'product_Id'=>$product->id
        // ]);
        //b2: lấy id của sản phẩm đã thêm thêm cho variant
        //Thêm nhiều variant
        // foreach($request->variants as $variant){
        //     ProductVariant::create([
        //         'color'=>$variant['color'],
        //         'stock'=>$variant['stock'],
        //         'price'=>$variant['price'],
        //         'internal_memory'=>$variant['internal_memory'],
        //         'product_id'=>$product->id,
        //         'image'=>null
        //     ]);
        // }

        //b3:
        return redirect()->route('product.index')->with('msg','Thêm sản phẩm thành công!');
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
    public function filter(Request $req){
        if($req->opt=='all'){
            $danhSachSanPham = Product::where('status',1)->get();
        }else{
            $danhSachSanPham = Product::findProductByCategory($req->opt);
        }

        return  $danhSachSanPham;
    }
}
