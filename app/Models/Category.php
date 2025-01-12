<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    //
    use HasFactory;

    protected $fillable = ['id', 'name', 'slug', 'status'];
    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
    public function category_specifications(): HasMany
    {
        return $this->hasMany(CategorySpecification::class);
    }
}
