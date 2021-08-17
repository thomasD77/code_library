<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $fillable = [
        'photo_id',
        'brand_id',
        'name',
        'body',
        'price',
        'long_description',
        'tec_sheet',
        'slug',
    ];

    public $sortable = ['id', 'name',];


    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function productcategories()
    {
        return $this->belongsToMany(ProductCategory::class, "product_productcategory");
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderdetails()
    {
        return $this->hasMany(Orderdetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function productcolors()
    {
        return $this->belongsToMany(ProductColor::class, 'product_product_color');
    }

    public function promos()
    {
        return $this->belongsToMany(Promo::class, 'product_promo');
    }

    public function getRouteKey()
    {
        return 'slug';
    }





}
