<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductUser extends Model
{
    use HasFactory;
    public static function TimKiemSanPham($slug, $brandName = null)
    {
        if ($brandName) {
            $danhSachSanPham =  DB::table('products')
                ->select(
                    'products.id',
                    'products.name',
                    'products.rating',
                    'categories.name as category_name',
                    'brands.name as brand_name',
                    DB::raw('MIN(image_products.image) as image'),
                    DB::raw('MIN(product_variants.price) as price')
                )
                ->join('image_products', 'products.id', '=', 'image_products.product_id')
                ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'brands.category_id', '=', 'categories.id')
                ->where('products.status', 1)
                ->Where('categories.slug', '=', $slug)
                ->Where('brands.name', '=', $brandName)
                ->groupBy('products.id', 'products.name', 'products.rating', 'categories.name', 'brands.name')
                ->paginate(8);
        } else {
            $danhSachSanPham =  DB::table('products')
                ->select(
                    'products.id',
                    'products.name',
                    'products.rating',
                    'categories.name as category_name',
                    'brands.name as brand_name',
                    DB::raw('MIN(image_products.image) as image'),
                    DB::raw('MIN(product_variants.price) as price')
                )
                ->join('image_products', 'products.id', '=', 'image_products.product_id')
                ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'brands.category_id', '=', 'categories.id')
                ->where('products.status', 1)
                ->where(function ($query) use ($slug) {
                    $query->Where('categories.slug', '=', $slug)
                        ->orWhere('brands.name', '=', $slug);
                })->groupBy('products.id', 'products.name', 'products.rating', 'categories.name', 'brands.name')
                ->paginate(8);
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
        ->get();
        return $danhSachSanPham;
    }
    public static function HinhAnhSamPham($slug){
        return DB::table('image_products')
        ->join('product','products.id','=','image_products.product_id')
        ->select('image_products.image')
        ->where('products.slug',$slug)
        ->get();
    }
    public static function LuotThichSanPham($slug){
        return DB::table('like_products')
        ->join('product','products.id','=','like_products.product_id')
        ->select('like_products.id')
        ->where('products.slug',$slug)
        ->get();
    }
    public static function ThongSoKiThuatSanPham($slug){
        return DB::table('product_specifications')
        ->join('product','products.id','=','product_specifications.product_id')
        ->where('products.slug',$slug)
        ->get();
    }
    public static function BoNhoTrongSanPham($slug){
        return DB::table('product_variants')
        ->join('product','products.id','=','product_variants.product_id')
        ->select('internal_memory , price')
        ->where('product.slug',$slug)
        ->orderBy('internal_memory')
        ->get();
    }
    public static function MauSanPham($slug,$internal_memory){
        return DB::table('product_variants')
        ->join('product','products.id','=','product_variants.product_id')
        ->select('coler','price,stockstock')
        ->where('product.slug',$slug)
        ->where('product_variants',$internal_memory)
        ->get();
    }
    public static function ThongTinSanPham($slug){
        return DB::table('products')
        ->select('name','view','description')
        ->where('slug',$slug);
    }

    public static function LayThongTinSanPham($category){
        if($category === 'Điện Thoại')
             $tam = 'rating';
        else
            $tam = 'created_at';
        return DB::table('products')
        ->select(
            'products.id',
            'products.name',
            'products.rating',
            'categories.name as category_name',
            'brands.name as brand_name',
            DB::raw('MIN(image_products.image) as image'),
            DB::raw('MIN(product_variants.price) as price')
        )
        ->join('image_products', 'products.id', '=', 'image_products.product_id')
        ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'brands.category_id', '=', 'categories.id')
        ->where('products.status', 1)
        ->where('categories.name',$category)->groupBy('products.id', 'products.name', 'products.rating', 'categories.name', 'brands.name')
        ->orderBy('products.'.$tam,'desc')->take(8)->get();
    }

}
