<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama_lengkap' => 'Admin 1',
            'email' => 'admin1@mail.com',
            'password' => Hash::make('12345678'),
            'token' => null,

        ]);
        
        Admin::create([
            'nama_lengkap'=>'Admin 2',
            'email'=> 'admin2@mail.com',
            'password' => Hash::make('12345678'),
            'token' => null,
        ]);

        Admin::create([
            'nama_lengkap'=>'Admin 3',
            'email'=> 'admin3@mail.com',
            'password' => Hash::make('12345678'),
            'token' => null,
        ]);
    }
}
