<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan baris ini ada

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Zynn',
            'email' => 'admin@smkn1nabire.com',
            'password' => Hash::make('rahasia123'), // Hash::make fungsinya untuk mengenkripsi password
        ]);
    }
}

