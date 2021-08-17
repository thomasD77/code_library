<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = Role::all();
        User::all()->each(function ($user) use ($roles){
            if($user->id != 1){
                $user->roles()->attach(
                    $roles->random(rand(1,2))->pluck('id')->toArray()
                );
            }else{
                DB::table('user_role')->insert(['user_id' => 1, 'role_id' => 1]);
            }
        });
    }
}
