<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    /** @use HasFactory<\Database\Factories\PenulisFactory> */
    use HasFactory;

    protected $fillable = [
        "nama_penulis",
        "tanggal_lahir",
        "asal_daerah",
        "biografi",
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class, 'penulis_id');
    }
}
