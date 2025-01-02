<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = ['name','slug','brand_id','description'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    static public function findProductByCategory($category){
        return DB::connection('mysql')->select('SELECT products.id,products.name,products.slug
                                                FROM `categories`inner join products on categories.id = products.category_id inner join brands on brands.id = products.brand_id
                                                WHERE categories.slug= ?',[$category]);
    }
}
