<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_subcategories')->insert(['name'=> 'Full Face Masks', 'description'=> 'Full Face Masks. The MSA full face mask with filters are specifically designed for a clear field of view and creating safe', 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('product_subcategories')->insert(['name'=> 'Swimwear', 'description' => 'Where are the beach babes at? Get vacay ready with the swimwear from NA-KD', 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('product_subcategories')->insert(['name'=> 'Diving suits', 'description' => 'A diving suit is a garment or device designed to protect a diver from the underwater environment ', 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);
        DB::table('product_subcategories')->insert(['name'=> 'Diving computer', 'description' => 'As all Suunto dive computers, the fully customizable color display devices Suunto EON Steel and Suunto EON Core are designed,', 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

    }
}
