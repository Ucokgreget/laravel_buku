<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = [
        "nama_buku",
        "penulis_id",
        "tahun_terbit",
        "kota_terbit",
        "sinopsis",
        "cover_buku",
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }

    public function KategoriBuku()
    {
        return $this->hasMany(KategoriBuku::class, 'buku_id');
    }
}
