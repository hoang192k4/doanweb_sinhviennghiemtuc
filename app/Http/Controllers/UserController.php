<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('user.pages.index');
    }

    public function TimKiemSanPham($slug)
    {
        $danhSachSanPham = DB::table('products')
            ->select(
                'products.id',
                'products.name',
                'products.rating',
                'categories.name as category_name',
                'brands.name as brand_name',
                DB::raw('MIN(image_products.image) as image'), // Lấy hình ảnh đầu tiên
                DB::raw('MIN(product_variants.price) as price') // Lấy giá thấp nhất
            )
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('image_products', 'products.id', '=', 'image_products.product_id')
            ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->where('categories.slug', '=', $slug)
            ->orWhere('brands.name', '=', $slug)
            ->groupBy('products.id', 'products.name', 'products.rating', 'categories.name', 'brands.name') // Nhóm theo các cột cần thiết
            ->get();
        return view('user.pages.search')->with('danhSachSanPham',$danhSachSanPham);
    }
}
