<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSubcategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function productcategories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_subcategory' , 'product_category_id', 'product_subcategory_id');
    }
}
