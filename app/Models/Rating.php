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
    protected $fillable=['id','content','point','color','internal_memory','product_id','user_id'];
    use HasFactory;
    public function image_ratings():HasMany{
        return $this->hasMany(ImageRating::class);
    }
    public function user():BeLongsTo{
        return $this->beLongsTo(User::class);
    }
    public static function DanhGia($user,$code){
        return DB::table('orders')
        ->join('order_items','order_id','=','orders.id')
        ->join('order_status','order_status_id','=','order_status.id')
        ->join('users','orders.user_id','=','users.id')
        ->join('product_variants','product_variant_id','=','product_variants.id')
        ->join('products','product_variants.product_id','=','products.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->where('order_status.name','=','Giao hàng thành công')
        ->where('orders.user_id',$user)
        ->where('orders.order_code',$code)
        ->select('order_items.*','brands.name','product_variants.image')
        ->distinct()
        ->get();
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
