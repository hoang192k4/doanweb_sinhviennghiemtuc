<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ImageProduct;
use Illuminate\Support\Facades\File;
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
        $danhSachThuongHieu = Brand::filter(1);
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
            'image.*'=>'required|image|mimes:jpeg,png,jpg|max:2048',
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
            'variants.*.stock'=>'required|min:0',
            'variants.*.internal_memory'=>'required',
            'variants.*.price'=>'required|min:0',
            'variants.*.image_variant'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'name.required'=> 'Vui lòng nhập tên sản phẩm!',
            'name.unique'=>'Tên sản phẩm đã tồn tại!',
            'description.required'=>'Vui lòng nhập mô tả!',
            'image.required'=>'Vui lòng thêm hình ảnh!',
            'display.required'=>'Vui lòng nhập hình kích thước màn hình!',
            'technic_screen'=>'Vui lòng nhập công nghệ màn hình!',
            'resolution' =>'Vui lòng nhập độ phân giải màn hình!',
            'chipset'=>'Vui lòng nhập chipset!',
            'os'=>'Vui lòng nhập hệ điều hành!',
            'ram'=>'Vui lòng nhập ram!',
            'size'=>'Vui lòng nhập kích thước sản phẩm',
            'launch_time'=>'Vui lòng nhập ngày ra mắt sản phẩm',
            'camera'=>'Vui lòng nhập thông tin camera của sản phẩm!'
        ]);

        //thêm sản phẩm
        $product = Product::create([
            'name'=>$request->input('name'),
            'slug'=>Str::slug($request->input('name')),
            'description'=>$request->input('description'),
            'brand_id'=>$request->input('brand'),
        ]);
        // //thêm nhiều hình ảnh sản phẩm từ id sản phẩm ở $product
        $idx = 0;
        foreach($request->image as $image){
            $extension = $image->getClientOriginalExtension();
            $fileName = 'product_'.$idx.time().'.'.$extension;
            $image->move(public_path('images'), $fileName);
            ImageProduct::create([
                'image'=>$fileName,
                'product_id'=> $product->id
            ]);
            $idx++;
        }

        //thêm thông số kĩ thuật cho sản phẩm từ id của $product
        ProductSpecification::create([
            'display'=>$request->input('display'),
            'technic_screen'=>$request->input('technic_screen'),
            'resolution'=>$request->input('resolution'),
            'chipset'=>$request->input('chipset'),
            'ram'=>$request->input('ram'),
            'camera'=>$request->input('camera'),
            'operating_system'=>$request->input('os'),
            'size'=>$request->input('size'),
            'launch_time'=>$request->input('launch_time'),
            'product_Id'=>$product->id
        ]);

        //Thêm nhiều variant
        foreach($request->variants as $variant){
            ProductVariant::create([
                'color'=>$variant['color'],
                'stock'=>$variant['stock'],
                'price'=>$variant['price'],
                'internal_memory'=>$variant['internal_memory'],
                'product_id'=>$product->id,
                'image'=> ProductVariant::uploadImageVariant($variant['image_variant'])
                ]);
        }

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
        $danhSachPhanLoai = Category::where('status',1)->get();
        $sanPham = Product::with('brand.category')->find($id);
        $danhSachThuongHieu = $sanPham->brand->category->brands;
        $thongSoKyThuat = $sanPham->product_specification;

        return view('admin.product.editproduct',['danhSachPhanLoai'=>$danhSachPhanLoai,'danhSachThuongHieu'=>$danhSachThuongHieu,'sanPham'=>$sanPham]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([
            'description'=>'required',
            'display'=>'required',
            'technic_screen'=>'required',
            'resolution'=>'required',
            'chipset'=>'required',
            'os'=>'required',
            'ram'=>'required',
            'size'=>'required',
            'launch_time'=>'required',
            'camera'=>'required',

        ],[
            'name.required'=> 'Vui lòng nhập tên sản phẩm!',
            'name.unique'=>'Tên sản phẩm đã tồn tại!',
            'description.required'=>'Vui lòng nhập mô tả!',
        ]);

        $product = Product::find($request->id);
        //chỉnh và thêm các ảnh của sản phẩm
        for($i = 0; $i < count($request->image_id);$i++){
            if(isset($request->image[$i]))
            {
                //kiểm tra nếu request->image[$i] có hình ảnh thì tiếp tục thao tác
                //đồng thời kiểm tra image_id của hình ảnh nếu là có id rùi thì cập nhật, id trả về -1 thì thêm mới hình ảnh
                if($request->image_id[$i]!=-1)
                {
                    $image = $request->image[$i];
                    $extension = $image->getClientOriginalExtension();
                    $fileName = 'product_'.$i.time().'.'.$extension;
                    $image->move(public_path('images'), $fileName);
                    ImageProduct::where('product_id',$product->id)
                                ->where('id',$request->image_id[$i])
                                ->update([
                                    'image'=>$fileName,
                                ]);
                }else{
                    $image = $request->image[$i];
                    $extension = $image->getClientOriginalExtension();
                    $fileName = 'product_'.$i.time().'.'.$extension;
                    $image->move(public_path('images'), $fileName);
                    ImageProduct::create(['image'=>$fileName,'product_id'=>$product->id]);
                }

            }
        }
        //cập nhật specification
        $product->update(['name'=>$request->input('name'),'slug'=>Str::slug($request->input('name')),'description'=>$request->description,'brand_id'=>$request->brand]);
        $product->product_specification->update(['display'=>$request->input('display'),
        'technic_screen'=>$request->technic_screen,'resolution'=>$request->resolution,'chipset'=>$request->chipset,'ram'=>$request->ram,'operating_system'=>$request->os,'camera'=>$request->camera,'launch_time'=>$request->launch_time,'size'=>$request->size]);
        return redirect()->route('product.index')->with('msg','chỉnh sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $product = Product::find($id);
        $name = $product->name;
        if($product){
            $variants = $product->product_variants;
            foreach($variants as $variant){
                if ($variant->image && File::exists(public_path('images/' . $variant->image))) {
                    File::delete(public_path('images/' . $variant->image));
                }
            }
            $image_products = $product->image_products;
            foreach( $image_products as $image_product){
                if ($image_product->image && File::exists(public_path('images/' . $image_product->image))) {
                    File::delete(public_path('images/' . $image_product->image));
                }
            }
            $product->product_variants()->forceDelete();
            $product->product_specification()->forceDelete();
            $product->image_products()->forceDelete();
            $product->forceDelete();

            return 'Xóa sản phẩm '.$name.' thành công!';
        }
        return 'Xóa sản phẩm '.$name.' không thành công!';
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



    public function getListProductsUnapproved(){
        $danhSachSanPham = Product::where('status',2)->get();
        $danhSachSanPhamBiAn = Product::where('status',0)->get();
        return view('admin.product.product_approved',['danhSachSanPham'=>$danhSachSanPham,'danhSachSanPhamBiAn'=>$danhSachSanPhamBiAn]);
    }

    public function active($id){
        $product = Product::find($id);
        if($product->status!=1){
            $product->update(['status'=>1]);
            $product->product_variants()->update([
                'status'=>1
            ]);
        }
        return back()->with('msg','Sản phẩm '.$product->name.' đã được hiển thị!');
    }

    public function deactive($id){
        $product = Product::find($id);
        $product->update(['status'=>0]);
        $product->product_variants()->update([
            'status'=>0
        ]);
        return 'Ẩn sản phẩm thành công!';
    }

    public function isIssetProduct(Request $request)
    {
        $slug = Str::slug($request->name);
        $sanPham = Product::where('slug',$slug)->first();
        if(isset($sanPham))
            return 1;
        return 0;
    }
}
