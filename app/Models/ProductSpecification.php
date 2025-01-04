<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSpecification extends Model
{
    //
    use HasFactory;
    protected $fillable = ['display','technic_screen','resolution','chipset','ram','operating_system','camera','launch_time','size','product_Id'];
    public $timestamps = false;
}
