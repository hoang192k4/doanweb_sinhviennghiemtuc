<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ProductVariant extends Model
{
    //
    use HasFactory;
    protected $fillable = ['color','price','stock','internal_memory','image','product_id','status'];

    public function product():BeLongsTo
    {
        return $this->beLongsTo(Product::class);
    }
    static public function uploadImageVariant($file,$index){
        $fileName = 'product_variant_'.$index.time().'.png';
        $file->move(public_path('images'), $fileName);
        return $fileName;
    }
}
