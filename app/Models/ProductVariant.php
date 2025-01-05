<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductVariant extends Model
{
    //
    use HasFactory;
    protected $fillable = ['color','price','stock','internal_memory','image','product_id','status'];

    static public function uploadImageVariant($file){
        $extension = $file->getClientOriginalExtension();
        $fileName = 'product_variant_'.time().'.'.$extension;
        $file->move(public_path('images'), $fileName);
        return $fileName;
    }
}
