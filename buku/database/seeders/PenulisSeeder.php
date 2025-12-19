<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penulis = [[
            "nama_penulis" => "Andrea Hirata",
            "tanggal_lahir" => "1967-10-24",
            "asal_daerah" => "Belitung, Indonesia",
            "biografi" => "Andrea Hirata adalah seorang penulis Indonesia yang terkenal dengan novelnya 'Laskar Pelangi'. Ia lahir di Belitung dan telah menulis beberapa karya yang mengangkat tema pendidikan dan kehidupan di Indonesia.",
        ],
        [
            "nama_penulis" => "Tere Liye",
            "tanggal_lahir" => "1979-01-21",
            "asal_daerah" => "Sumatra, Indonesia",
            "biografi" => "Tere Liye adalah seorang penulis produktif dari Indonesia yang telah menulis banyak novel populer. Karyanya sering kali mengangkat tema cinta, persahabatan, dan petualangan.",
        ]
    ];
        \DB::table('penulis')->insert($penulis);
    }
}
