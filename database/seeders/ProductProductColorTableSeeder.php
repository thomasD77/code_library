<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Seeder;

class ProductProductColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $colors = ProductColor::all();
        Product::all()->each(function ($product) use ($colors){
            $product->productcolors()->attach(
                $colors->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
