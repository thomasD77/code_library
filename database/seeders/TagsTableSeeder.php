<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->insert(['name' => 'Eco Drive']);
        DB::table('tags')->insert(['name' => 'Automatic']);
        DB::table('tags')->insert(['name' => 'Carbon']);
        DB::table('tags')->insert(['name' => 'Rubber Band']);
        DB::table('tags')->insert(['name' => 'Springstrap']);
    }
}
