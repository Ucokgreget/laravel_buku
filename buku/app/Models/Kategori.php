<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriFactory> */
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = [
        "nama_kategori",
        "slug",
    ];

    public function kategoriBuku()
    {
        return $this->hasMany(KategoriBuku::class, 'kategori_id');
    }
}
