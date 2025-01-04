<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductUser extends Model
{
    use HasFactory;
    public static function TimKiemSanPham($slug,$brandName = null){
        if($brandName){
            $danhSachSanPham =  DB::table('products')
            ->select(
                'products.id',
                'products.name',
                'products.rating',
                'categories.name as category_name',
                'brands.name as brand_name',
                DB::raw('MIN(image_products.image) as image'), // Lấy hình ảnh đầu tiên
                DB::raw('MIN(product_variants.price) as price') // Lấy giá thấp nhất
            )
            ->join('image_products', 'products.id', '=', 'image_products.product_id')
            ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'brands.category_id', '=', 'categories.id')
            ->Where('categories.slug', '=', $slug)
            ->Where('brands.name', '=', $brandName)
            ->groupBy('products.id', 'products.name', 'products.rating', 'categories.name', 'brands.name') // Nhóm theo các cột cần thiết
            ->paginate(1);
        }
        else {
            $danhSachSanPham =  DB::table('products')
            ->select(
                'products.id',
                'products.name',
                'products.rating',
                'categories.name as category_name',
                'brands.name as brand_name',
                DB::raw('MIN(image_products.image) as image'), // Lấy hình ảnh đầu tiên
                DB::raw('MIN(product_variants.price) as price') // Lấy giá thấp nhất
            )
            ->join('image_products', 'products.id', '=', 'image_products.product_id')
            ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'brands.category_id', '=', 'categories.id')
            ->Where('categories.slug', '=', $slug)
            ->orWhere('brands.name', '=', $slug)
            ->groupBy('products.id', 'products.name', 'products.rating', 'categories.name', 'brands.name') // Nhóm theo các cột cần thiết
            ->paginate(1);
        }
        return $danhSachSanPham;
    }
    public static function TimKiemTheoTuKhoa($key){
        $danhSachSanPham =  DB::table('products')
        ->select(
            'products.id',
            'products.name',
            'products.rating',
            'categories.name as category_name',
            'brands.name as brand_name',
            DB::raw('MIN(image_products.image) as image'), // Lấy hình ảnh đầu tiên
            DB::raw('MIN(product_variants.price) as price') // Lấy giá thấp nhất
        )
        ->join('image_products', 'products.id', '=', 'image_products.product_id')
        ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'brands.category_id', '=', 'categories.id')
        ->where('categories.name', 'LIKE', '%' . $key . '%')
        ->orWhere('brands.name', 'LIKE', '%' . $key . '%')
        ->orWhere('products.name', 'LIKE', '%' . $key . '%')
        ->orWhere('products.description', 'LIKE', '%' . $key . '%')
        ->orWhere('product_variants.price', 'LIKE', '%' . $key . '%')
        ->Where('products.status',1)
        ->groupBy('products.id', 'products.name', 'products.rating', 'categories.name', 'brands.name') // Nhóm theo các cột cần thiết
        ->paginate(1);
        return $danhSachSanPham;
    }
}
