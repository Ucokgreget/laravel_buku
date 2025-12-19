<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku = [[
            "nama_buku" => "Laskar Pelangi",
            "penulis_id" => 1,
            "tahun_terbit" => "2005",
            "kota_terbit" => "Jakarta",
            "sinopsis" => "Laskar Pelangi adalah novel karya Andrea Hirata yang menceritakan perjuangan sekelompok anak di Belitung dalam mengejar pendidikan meskipun menghadapi berbagai rintangan.",
            "cover_buku" => "laskar_pelangi.jpg",
        ],
        [
            "nama_buku" => "Hafalan Shalat Delisa",
            "penulis_id" => 2,
            "tahun_terbit" => "2009",
            "kota_terbit" => "Jakarta",
            "sinopsis" => "Hafalan Shalat Delisa adalah novel karya Tere Liye yang mengisahkan tentang seorang gadis kecil bernama Delisa yang berjuang untuk tetap bersekolah setelah bencana tsunami melanda desanya.",
            "cover_buku" => "hafalan_shalat_delisa.jpg",
        ]];
        DB::table('buku')->insert($buku);
    }
}
