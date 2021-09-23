<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name1 = env("DEFAULT_USER_NAME_1");
        $pass1 = env("DEFAULT_USER_PASS_1");
        $name2 = env("DEFAULT_USER_NAME_2");
        $pass2 = env("DEFAULT_USER_PASS_2");
        
        User::updateOrCreate(['name' => $name1], ['password' => Hash::make($pass1)]);
        User::updateOrCreate(['name' => $name2], ['password' => Hash::make($pass2)]);
    }
}
