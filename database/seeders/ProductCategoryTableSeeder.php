<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_categories')->insert(['name'=> 'Snorkeling', 'slug'=> 'Snorkeling', 'description'=> 'Snorkeling is the practice of swimming on or through a body of water while equipped with a diving mask, a shaped breathing tube called a snorkel', 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('product_categories')->insert(['name'=> 'Swimming', 'slug'=> 'Swimming', 'description' => 'Swimming is an individual or team racing sport that requires the use of ones entire body to move through water.', 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('product_categories')->insert(['name'=> 'Diving',  'slug'=> 'Diving', 'description' => 'Diving is the sport of jumping or falling into water from a platform or springboard, usually while performing acrobatics. ', 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('product_categories')->insert(['name'=> 'Tec Diving', 'slug'=> 'Tec-Diving', 'description' => 'Technical dives may be defined as being dives deeper than about 130 feet (40 m) or dives in an overhead environment with no direct access to the surface or', 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

    }

}
