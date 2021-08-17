<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('photos')->insert(['file' => 'user_thomas.jpg', 'small'=> 'user_thomas.jpg', 'custom'=> 'user_thomas.jpg',  'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('photos')->insert(['file' => 'deepwater.png', 'small'=> 'deepwater.png', 'custom'=> 'deepwater.png','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('photos')->insert(['file' => 'people1.PNG', 'small'=> 'deepwater.png', 'custom'=> 'deepwater.png','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('photos')->insert(['file' => 'people2.PNG', 'small'=> 'deepwater.png', 'custom'=> 'deepwater.png','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('photos')->insert(['file' => 'people3.PNG', 'small'=> 'deepwater.png', 'custom'=> 'deepwater.png','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('photos')->insert(['file' => 'placeholder.PNG', 'small'=> 'deepwater.png', 'custom'=> 'deepwater.png','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('photos')->insert(['file' => 'divingresort.PNG', 'small'=> 'deepwater.png', 'custom'=> 'deepwater.png','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);
    }
}
