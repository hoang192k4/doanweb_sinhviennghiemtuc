<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\HasMany;


class CategorySpecification extends Model
{
    //
    use HasFactory;

    public function category(): HasMany
    {
        return $this->hasMany(CategorySpecification::class);
    }

    protected $table = 'category_specifications';
    protected $fillable = ['id', 'category_id', 'name'];
    public $timestamps = false;
}
