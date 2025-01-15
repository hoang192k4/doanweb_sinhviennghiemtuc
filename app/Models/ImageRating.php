<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageRating extends Model
{
    //
    public $fillable = ['image','product_id'];
    public $timestamps = false;
}
