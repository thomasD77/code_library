<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory;
    use softdeletes;

    protected $fillable = [
      'name',
      'description',
        'slug',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_productcategory');
    }

    public function productsubcategories()
    {
        return $this->belongsToMany(ProductSubcategory::class, 'product_subcategory' , 'product_category_id', 'product_subcategory_id');
    }

    public function getRouteKey()
    {
        return 'slug';
    }



}
