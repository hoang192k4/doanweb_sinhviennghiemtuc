<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = ['name','slug','brand_id','description','status'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    static public function findProductByCategory($category){
        return DB::connection('mysql')->select('select *
                                                from categories inner join brands on categories.id = brands.category_id inner join products on products.brand_id = brands.id
                                                where categories.slug = ?',[$category]);
    }
    public function product_variants():HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function image_products():HasMany
    {
        return $this->hasMany(ImageProduct::class);
    }
    public function product_specification():HasOne
    {
        return $this->hasOne(ProductSpecification::class);
    }
}
