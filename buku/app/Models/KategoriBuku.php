<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriBukuFactory> */
    use HasFactory;

    protected $table = 'kategori_buku';

    protected $fillable = [
        "buku_id",
        "kategori_id",
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
