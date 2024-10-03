<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password123'),
            'divisi' => 'Marketing'
        ]);

        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('password456'),
            'divisi' => 'hrd'
        ]);

        User::create([
            'name' => 'Maymunah',
            'email' => 'mynh@gmail.com',
            'password' => Hash::make('xybca'),
            'divisi' => 'IT Support'
        ]);

        User::create([
            'name' => 'Azka',
            'email' => 'azk@gmail.com',
            'password' => Hash::make('xybca123'),
            'divisi' => 'programmer'
        ]);
    }
}
