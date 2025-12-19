<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori_buku = [[
            "buku_id" => 1,
            "kategori_id" => 1,
        ],
        [
            "buku_id" => 1,
            "kategori_id" => 2,
        ],
        [
            "buku_id" => 2,
            "kategori_id" => 2,
        ]];
        DB::table('kategori_buku')->insert($kategori_buku);
    }
}
