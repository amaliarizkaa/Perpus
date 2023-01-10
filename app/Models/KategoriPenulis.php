<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPenulis extends Model
{
    use HasFactory;

    protected $table = 'kategori_penulis';

    protected $fillable = [
        'nama_kategori', 'slug'
    ];

    protected $hidden = [];
}
