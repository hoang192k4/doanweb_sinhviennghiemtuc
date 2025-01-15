<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Rating extends Model
{
    protected $fillable=['id','content','point','color','internal_memory','product_id','user_id'];
    use HasFactory;
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
}
