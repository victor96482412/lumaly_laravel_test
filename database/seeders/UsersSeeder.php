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
        User::updateOrCreate(['name' => 'user1'], ['password' => Hash::make('111')]);
        User::updateOrCreate(['name' => 'user2'], ['password' => Hash::make('222')]);
    }
}
