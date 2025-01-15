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
                    'products.slug',
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
                ->groupBy('products.id', 'products.name', 'products.slug','products.rating', 'categories.name', 'brands.name')
                ->get();
        } else {
            $danhSachSanPham =  DB::table('products')
                ->select(
                    'products.id',
                    'products.name',
                    'products.slug',
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
                })->groupBy('products.id', 'products.name','products.slug','products.rating', 'categories.name', 'brands.name')
                ->get();
        }
        return $danhSachSanPham;
    }
    public static function TimKiemTheoTuKhoa($key)
    {
        // Tách từ khóa
        $keywords = preg_split('/\s+/', trim($key));
        $danhSachSanPham = DB::table('products')
            ->select(
                'products.id',
                'products.name',
                'products.slug',
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
            ->where('products.status', 1)
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($q) use ($word) {
                        $q->whereRaw('LOWER(categories.name COLLATE utf8mb4_unicode_ci ) LIKE ?', ["%{$word}%"])
                            ->orWhereRaw('LOWER(brands.name COLLATE utf8mb4_unicode_ci ) LIKE ?', ["%{$word}%"])
                            ->orWhereRaw('LOWER(products.name COLLATE utf8mb4_unicode_ci ) LIKE ?', ["%{$word}%"])
                            ->orWhereRaw('LOWER(products.description COLLATE utf8mb4_unicode_ci ) LIKE ?', ["%{$word}%"])
                            ->orWhereRaw('CAST(product_variants.price AS CHAR) LIKE ?', ["%{$word}%"]);
                    });
                }
            })
            ->groupBy('products.id', 'products.name', 'products.slug', 'products.rating', 'categories.name', 'brands.name')
            ->orderBy('products.name')
            ->get();

        return $danhSachSanPham;
    }

    public static function HinhAnhSamPham($slug){
        return DB::table('image_products')
        ->join('products','products.id','=','image_products.product_id')
        ->select('image_products.image')
        ->where('products.slug',$slug)
        ->get();
    }
    public static function LuotThichSanPham($slug){
        return DB::table('like_products')
        ->join('products','products.id','=','like_products.product_id')
        ->select('like_products.id')
        ->where('products.slug',$slug)
        ->count();
    }
    public static function ThongSoKiThuatSanPham($slug){
        return DB::table('product_specifications')
        ->join('products','products.id','=','product_specifications.product_id')
        ->select('product_specifications.*')
        ->where('products.slug',$slug)
        ->get();
    }
    public static function BoNhoTrongSanPham($slug){
        return DB::table('product_variants')
        ->join('products','products.id','=','product_variants.product_id')
        ->select('internal_memory' , 'price')
        ->distinct()
        ->where('products.slug',$slug)
        ->where('product_variants.status',1)
        ->orderBy('internal_memory')
        ->get();
    }
    public static function MauSanPham($slug,$internal_memory){
        return DB::table('product_variants')
        ->join('products','product_variants.product_id','=','products.id')
        ->select('product_variants.id','product_variants.color','product_variants.price','product_variants.stock','product_variants.image','product_variants.internal_memory','products.slug')
        ->where('products.slug',$slug)
        ->where('product_variants.internal_memory',$internal_memory)
        ->where('product_variants.status',1)
        ->get();
    }
    public static function ThongTinSanPham($slug){
        return DB::table('products')
        ->join('brands','brand_id','=','brands.id')
        ->join('categories','category_id','=','categories.id')
        ->select('products.name','views','description','brands.name as brand','categories.slug','products.id')
        ->where('products.slug',$slug)->get();
    }
    public static function UpdateView($slug){
        DB::table('products')
        ->where('slug',$slug)
        ->increment('views');
    }
    public static function LayBoNhoNhoNhat($slug){
        return  DB::table('product_variants')
        ->join('products','product_id','=','products.id')
        ->where('products.slug',$slug)
        ->select(DB::raw('MIN(internal_memory) as internal_memory'))
        ->first();
    }
    public static function LayThongTinSanPhamTheoMau($slug,$internal_memory,$color){
        return  DB::table('product_variants')
        ->join('products','product_id','=','products.id')
        ->where('products.slug',$slug)
        ->where('product_variants.internal_memory',$internal_memory)
        ->where('product_variants.color',$color)
        ->select('product_variants.id','product_variants.price','product_variants.image','product_variants.stock')
        ->first();
    }
    public static function SanPhamBanChay(){
        return DB::table('order_items')
        ->select(
            'products.id',
            'products.name',
            'order_items.slug_product as slug',
            'products.rating',
            DB::raw('MIN(product_variants.price) as price'),
            DB::raw('COUNT("order_items.slug_product")as count')
        )
        ->join('product_variants','order_items.product_variant_id','=','product_variants.id')
        ->join('products','product_variants.product_id','=','products.id')
        ->join('orders','order_items.order_id', '=' ,'orders.id')
        ->groupBy('products.id', 'products.name', 'order_items.slug_product','products.rating','product_variants.product_id')
        ->orderBy(DB::raw('COUNT("order_items.slug_product")'),'desc')
        ->where('products.status',1)
        ->where('order_status_id',6)
        ->take(8)->get();
    }
    public static function LayThongTinSanPham($category){
        return DB::table('products')
        ->select(
            'products.id',
            'products.name',
            'products.slug',
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
        ->where('categories.name',$category)->groupBy('products.id', 'products.name', 'products.slug','products.rating', 'categories.name', 'brands.name')
        ->orderBy('products.created_at','desc')->take(8)->get();
    }
    public static function SanPhamTuongDuong($category,$brand,$slug){
        return DB::table('products')
        ->select(
            'products.name',
            'products.rating',
            'products.slug',
            DB::raw('MIN(image_products.image) as image'),
            DB::raw('MIN(product_variants.price) as price')
        )
        ->join('image_products', 'products.id', '=', 'image_products.product_id')
        ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'brands.category_id', '=', 'categories.id')
        ->where('products.status', 1)
        ->where('brands.name',$brand)
        ->where('product_variants.status',1)
        ->where('products.slug','!=',$slug)
        ->where('categories.slug',$category)->groupBy( 'products.name', 'products.rating' ,'products.slug')
        ->take(8)->get();
    }
    public static function LayDanhSachSanPhamTheoDanhMuc($category,$slug){
        return DB::table('products')
        ->select(
            'products.name',
            'products.rating',
            'products.slug',
            DB::raw('MIN(image_products.image) as image'),
            DB::raw('MIN(product_variants.price) as price')
        )
        ->join('image_products', 'products.id', '=', 'image_products.product_id')
        ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'brands.category_id', '=', 'categories.id')
        ->where('products.status', 1)
        ->where('products.slug','!=',$slug)
        ->where('products.status', 1)
        ->where('product_variants.status',1)
        ->where('categories.slug',$category)->groupBy( 'products.name', 'products.rating' ,'products.slug')
        ->take(8)->get();
    }
    public static function LayTenSanPhamTheoId($id)
    {
        return DB::table('products')
        ->where('id',$id)
        ->select('name')
        ->get();
    }
}

