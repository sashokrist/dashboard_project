<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'User 1',
            'email' => 'user1@test.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@test.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
