<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryaTP extends Model
{
    use HasFactory;

    protected $table = 'karya_t_p';

    protected $fillable = [
        'judul', 'judul_terbit', 'edisi', 'slug', 'penulis', 'penerbit', 'halaman', 'kategori_id', 'gambar_karya', 'user_id'
    ];

    protected $hidden = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kategori_penulis()
    {
        return $this->belongsTo(KategoriPenulis::class, 'kategori_id', 'id');
    }
}
