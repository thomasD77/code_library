<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert([
            'name'=>'Aquelung',
            'slug'=>'Aquelung',
            'description' => 'An "Aqualung" is a portable breathing apparatus for divers.' ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('brands')->insert([
            'name'=>'Bare',
            'slug'=>'Bare',
            'description' => 'BARE IS BUILT ON THREE SIMPLE PRINCIPLES; FIT, CRAFTSMANSHIP AND INNOVATION' ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('brands')->insert([
            'name'=>'Camaro',
            'slug'=>'Camaro',
            'description' => 'Camaro: A brand that stands for outstanding quality and product innovation.' ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('brands')->insert([
            'name'=>'ScubaPro',
            'slug'=>'ScubaPro',
            'description' => 'Deep down you want the BEST' ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('brands')->insert([
            'name'=>'Tusa',
            'slug'=>'Tusa',
            'description' => 'TUSA manufactures a full-line of scuba diving and snorkeling equipment as well as a wide range of watersports including swimming. ' ,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
