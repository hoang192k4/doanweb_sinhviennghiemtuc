<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    //
    use HasFactory;
    protected $fillable = ['id','code','name','discount_value','min_order_value'];
}
