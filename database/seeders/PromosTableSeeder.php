<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PromosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('promos')->insert(['name' => 'PromoDay', 'date_start' => Carbon::today()->subDays(rand(0, 165))
            , 'date_stop' => Carbon::today()->subDays(rand(165, 365)) ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('promos')->insert(['name' => 'PromoWeek', 'date_start' => Carbon::today()->subDays(rand(0, 165))
            , 'date_stop' => Carbon::today()->subDays(rand(165, 365)) ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('promos')->insert(['name' => 'PromoMonth', 'date_start' => Carbon::today()->subDays(rand(0, 165))
            , 'date_stop' => Carbon::today()->subDays(rand(165, 365)) ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('promos')->insert(['name' => 'NewToDay', 'date_start' => Carbon::today()->subDays(rand(0, 165))
            , 'date_stop' => Carbon::today()->subDays(rand(165, 365)) ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('promos')->insert(['name' => 'NewThisWeek', 'date_start' => Carbon::today()->subDays(rand(0, 165))
            , 'date_stop' => Carbon::today()->subDays(rand(165, 365)) ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('promos')->insert(['name' => 'NewThisMonth', 'date_start' => Carbon::today()->subDays(rand(0, 165))
            , 'date_stop' => Carbon::today()->subDays(rand(165, 365)) ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

        DB::table('promos')->insert(['name' => 'Trending', 'date_start' => Carbon::today()->subDays(rand(0, 165))
            , 'date_stop' => Carbon::today()->subDays(rand(165, 365)) ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);

    }
}
