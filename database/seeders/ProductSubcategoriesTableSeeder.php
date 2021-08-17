<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Database\Seeder;

class ProductSubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productsubcategories = ProductSubcategory::all();
        ProductCategory::all()->each(function ($productcategory) use ($productsubcategories){
            $productcategory->productsubcategories()->attach(
                $productsubcategories->random(rand(1,4))->pluck('id')->toArray());
        });

    }
}
