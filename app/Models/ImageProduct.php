<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ImageProduct extends Model
{
    //
    use HasFactory;

    public $fillable = ['image','product_id'];
    public $timestamps = false;
}
