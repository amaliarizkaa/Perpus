<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryaTI extends Model
{
    use HasFactory;

    protected $table = 'karya_t_i';

    protected $fillable = [
        'judul', 'slug', 'callnum', 'penulis', 'penerbit', 'subjek', 'tahun', 'halaman', 'kategori_id', 'deskripsi', 'gambar_karya', 'user_id'
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
