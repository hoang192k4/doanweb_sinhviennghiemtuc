<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Rating extends Model
{
    //
    use HasFactory;
    public static function DanhGia($id){
        return DB::table('orders')
        ->join('order_items','order_id','=','orders.id')
        ->join('order_status','order_status_id','=','order_status.id')
        ->join('users','orders.user_id','=','users.id')
        ->join('product_variants','product_variant_id','=','product_variants.id')
        ->where('order_status.name','=','Giao hàng thành công')
        ->where('orders.user_id',$id)
        ->select('order_items.slug_product','order_items.name_product','order_items.color','order_items.internal_memory','product_variants.image','order_items.quantity','order_items.price')
        ->distinct()
        ->get();
    }
}
