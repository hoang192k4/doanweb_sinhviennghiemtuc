<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorySpecification extends Model
{
    //
    use HasFactory;
    protected $fillable = ['id', 'category_id', 'name'];
    public $timestamps = false;
}
