<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'user 1',
            'email' => 'user1@mail.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'username' => 'user 2',
            'email' => 'user2@mail.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'username' => 'user 3',
            'email' => 'user3@mail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
