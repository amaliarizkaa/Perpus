<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \JordanMiguel\LaravelPopular\Traits\Visitable;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'berita_id';
    protected $fillable = [
        'judul', 'slug', 'user_id', 'gambar_berita', 'views', 'body'
    ];
    
    protected $hidden = [];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
