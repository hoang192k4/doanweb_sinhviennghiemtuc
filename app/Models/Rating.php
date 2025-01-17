<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BeLongsTo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Rating extends Model
{
    protected $fillable = ['id', 'content', 'point', 'color', 'internal_memory', 'product_id', 'user_id'];
    use HasFactory;
    public function image_ratings():HasMany{
        return $this->hasMany(ImageRating::class);
    }
    public function user():BeLongsTo{
        return $this->beLongsTo(User::class);
    }
    public static function DanhGia($user,$code){
        return DB::table('orders')
            ->join('order_items', 'order_id', '=', 'orders.id')
            ->join('order_status', 'order_status_id', '=', 'order_status.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('product_variants', 'product_variant_id', '=', 'product_variants.id')
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('order_status.name', '=', 'Giao hàng thành công')
            ->where('orders.user_id', $user)
            ->where('orders.order_code', $code)
            ->select('order_items.*', 'brands.name', 'product_variants.image')
            ->distinct()
            ->get();
    }

    public static function ShowListReview()
    {
        return DB::table('ratings')
            ->select(
                'ratings.*',
                'products.name as product_name',
                'users.username as username'
            )
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->join('products', 'ratings.product_id', '=', 'products.id')
            ->where('products.status', 1)
            ->where('ratings.status', 1)->get();
    }

    public static function SearchReview($keyword)
    {
        $keywords = preg_split('/\s+/', trim($keyword));
        return DB::table('ratings')
            ->select(
                'ratings.*',
                'products.name as product_name',
                'users.username as username'
            )
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->join('products', 'ratings.product_id', '=', 'products.id')
            ->where('products.status', 1)
            ->where('ratings.status', 1)
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($q) use ($word) {
                        $q->whereRaw('LOWER(users.username ) LIKE ?', ["%{$word}%"])
                            ->orWhereRaw('LOWER(ratings.content ) LIKE ?', ["%{$word}%"])
                            ->orWhereRaw('LOWER(products.name) LIKE ?', ["%{$word}%"]);
                    });
                }
            })->get();
    }
    public static function ListPointReview($pointreview)
    {
        return DB::table('ratings')
            ->select(
                'ratings.*',
                'products.name as product_name',
                'users.username as username'
            )
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->join('products', 'ratings.product_id', '=', 'products.id')
            ->where('products.status', 1)
            ->where('ratings.status', 1)
            ->where('ratings.point', $pointreview)->get();
    }
    public static function PointReview($point)
    {
        if ($point === 'Tất cả')
            return Rating::ShowListReview();
        else
            return Rating::ListPointReview($point);
    }
    public static function HienThiRating($slug,$point = null){
        if($point == null ){
            return DB::table('ratings')
            ->join('products', 'ratings.product_id', '=', 'products.id')
            ->join('image_ratings', 'ratings.id', '=', 'image_ratings.rating_id')
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->select(
                'ratings.id',
                'ratings.content',
                'ratings.point',
                'ratings.color',
                'ratings.internal_memory',
                'ratings.created_at',
                'users.full_name',
                'users.image AS user_image',
                DB::raw('GROUP_CONCAT(image_ratings.image) AS images')  // Gộp tất cả hình ảnh thành chuỗi
            )
            ->where('products.id', $slug)
            ->groupBy(
                'ratings.id',
                'ratings.content',
                'ratings.point',
                'ratings.color',
                'ratings.internal_memory',
                'ratings.created_at',
                'users.full_name',
                'users.image'
            )  // Nhóm thêm các cột của ratings và users
            ->get();
        }else {
            return DB::table('ratings')
            ->join('products', 'ratings.product_id', '=', 'products.id')
            ->join('image_ratings', 'ratings.id', '=', 'image_ratings.rating_id')
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->select(
                'ratings.id',
                'ratings.content',
                'ratings.point',
                'ratings.color',
                'ratings.internal_memory',
                'ratings.created_at',
                'users.full_name',
                'users.image AS user_image',
                DB::raw('GROUP_CONCAT(image_ratings.image) AS images')  // Gộp tất cả hình ảnh thành chuỗi
            )
            ->where('products.id', $slug)
            ->where('ratings.point',$point)
            ->groupBy(
                'ratings.id',
                'ratings.content',
                'ratings.point',
                'ratings.color',
                'ratings.internal_memory',
                'ratings.created_at',
                'users.full_name',
                'users.image'
            )  // Nhóm thêm các cột của ratings và users
            ->get();

        }

    }
}
