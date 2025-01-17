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
    public function product_specification():HasMany
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function ratings():HasMany
    {
        return $this->hasMany(Rating::class);
    }
     public function like_products():HasMany
    {
        return $this->hasMany(LikeProduct::class);
    }
    public static  function TimKiemTheoTuKhoa($key){
        $keywords = preg_split('/\s+/', trim($key));
        $danhSachSanPham = DB::table('products')
        ->select('products.*')
        ->where('products.status', 1)
        ->where(function ($query) use ($keywords) {
            foreach ($keywords as $word) {
                $query->orWhereRaw('LOWER(products.name COLLATE utf8mb4_unicode_ci) LIKE ?', ["%{$word}%"])
                      ->orWhereRaw('LOWER(products.description COLLATE utf8mb4_unicode_ci) LIKE ?', ["%{$word}%"]);
            }
        })
        ->orderBy('products.name')
        ->get();

    return $danhSachSanPham;
    }
}

