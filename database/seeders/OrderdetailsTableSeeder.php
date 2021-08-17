<?php

namespace Database\Seeders;

use App\Models\Orderdetail;
use Illuminate\Database\Seeder;

class OrderdetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Orderdetail::factory()->count(40)->create();
    }
}
