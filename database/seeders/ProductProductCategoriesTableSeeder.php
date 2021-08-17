<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productcategories = ProductCategory::all();
        Product::where('id', '<', 10)->each(function ($product) use ($productcategories){
            $product->productcategories()->attach(
                $productcategories->random(rand(1,4))->pluck('id')->toArray());
        });

    }

}

