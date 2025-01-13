<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class LikeProduct extends Model
{
    //
    use HasFactory;
    public static function TrangThai($sampham,$user){
        return DB::table('like_products')
        ->where('product_id',$sampham)
        ->where('user_id',$user)
        ->count();
    }
    public static function ThemSanPhamYeuThich ($sampham,$user){
        return DB::table('like_products')
        ->insert([
            'product_id'=>$sampham,
            'user_id'=>$user
        ]);
    }
    public static function XoaSanPhamYeuThich ($sampham,$user){
        return DB::table('like_products')
        ->where('product_id',$sampham)
        ->where('user_id',$user)
        ->delete();
    }
    public static function TongLuotThichSanPham($id){
        return DB::table('like_products')
        ->join('products','products.id','=','like_products.product_id')
        ->select('like_products.id')
        ->where('products.id',$id)
        ->count();
    }
}
