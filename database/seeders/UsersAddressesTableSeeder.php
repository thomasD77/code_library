<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $addresses = Address::all();
        User::all()->each(function ($user) use ($addresses){
            $user->addresses()->attach(
                $addresses->random(rand(1,4))->pluck('id')->toArray());
        });
    }
}
