<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductVariant extends Model
{
    //
    use HasFactory;
    protected $fillable = ['color','price','stock','internal_memory','image','product_id'];
}
