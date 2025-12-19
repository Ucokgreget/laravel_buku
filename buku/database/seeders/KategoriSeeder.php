<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [[
            "nama_kategori" => "Fiksi",
            "slug" => "fiksi",
        ],
        [
            "nama_kategori" => "Non-Fiksi",
            "slug" => "non-fiksi",
        ],
        [
            "nama_kategori" => "Ilmiah",
            "slug" => "ilmiah",
        ]];
        DB::table('kategori')->insert($kategori)    ;
    }
}
