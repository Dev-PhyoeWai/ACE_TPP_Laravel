<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@aceplus.com'], // Assuming email is unique
            [
                'name' => 'Admin User',
                'password' => Hash::make('ace@admin123'), // Replace with a secure password
                'is_admin' => true, // Assuming you have an is_admin field
            ]
        );
    }
}

//  Laravel Tinker
//  command => php artisan tinker

//    $user = \App\Models\User::updateOrCreate(
//        ['email' => 'admin@aceplus.com'],
//        [
//            'name' => 'Admin User',
//            'password' => \Illuminate\Support\Facades\Hash::make('ace@admin123'),
//            'is_admin' => true,
//        ]
//    );
