<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul', 'callnum',  'slug', 'pengarang', 'penerbit', 'tahun', 'jumlah', 'deskripsi', 'kategori_id', 'subjek', 'user_id', 'gambar_buku', 'views',
    ];

    protected $hidden = [];

    public function kategori_buku()
    {
        return $this->belongsTo(KategoriBuku::class, 'kategori_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
