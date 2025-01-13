<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    //
    use HasFactory;
    protected $fillable = ['id','product_variant_id','slug_product','name_product','color','internal_memory','quantity','price','total_price','order_id'];
    public $timestamps = false;
}
