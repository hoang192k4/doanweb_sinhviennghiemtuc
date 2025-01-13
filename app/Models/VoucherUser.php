<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class VoucherUser extends Model
{
    //
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','voucher_id','user_id'];
}
