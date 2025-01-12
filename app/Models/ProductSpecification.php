<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ProductSpecification extends Model
{
    //
    use HasFactory;
    protected $fillable = ['id','category_specification_id','product_id','value'];
    public $timestamps = false;


    static public function filter($category_id){
        return CategorySpecification::where('category_id',$category_id);
    }
    public function category_specification():BelongsTo
    {
        return $this->beLongsTo(CategorySpecification::class);
    }
}
