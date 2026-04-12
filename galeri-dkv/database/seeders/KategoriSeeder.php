<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Desain Grafis'],
            ['nama_kategori' => 'Videografi'],
            ['nama_kategori' => 'Ilustrasi'],
            ['nama_kategori' => 'Fotografi'],
        ]);
    }
}