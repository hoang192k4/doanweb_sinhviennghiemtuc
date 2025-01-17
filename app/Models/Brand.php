<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Pest\Mutate\Mutators\Visibility\FunctionPublicToProtected;

class Brand extends Model
{
    //
    use HasFactory;
    protected $fillable = ['id', 'name', 'image', 'status', 'category_id'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function category(): BeLongsTo
    {
        return $this->beLongsTo(Category::class);
    }
    static public function filter($category)
    {
        return DB::connection('mysql')->select('SELECT brands.id, brands.name
                                                FROM categories inner join brands on categories.id = brands.category_id
                                                WHERE categories.id = ? and brands.status = 1', [$category]);
    }
    public static function index()
    {
        return Db::table('brands')->where('status', 1)->select('name', 'image');
    }
}
