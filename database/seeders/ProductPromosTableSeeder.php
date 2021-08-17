<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Promo;
use Illuminate\Database\Seeder;

class ProductPromosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $promos = Promo::all();
        Product::where('id', '<', 10)->each(function ($product) use ($promos){
            $product->promos()->attach(
                $promos->random(rand(1,7))->pluck('id')->toArray());
        });

    }
}
