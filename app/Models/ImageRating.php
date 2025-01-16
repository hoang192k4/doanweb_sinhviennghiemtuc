<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageRating extends Model
{
    //
    protected $fillable = ['image','rating_id'];
    public $timestamps = false;
}
