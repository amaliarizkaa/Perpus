<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Buku;
use App\Models\KaryaBuku;
use App\Models\KaryaTI;
use App\Models\KaryaTP;
use App\Models\Klipping;
use App\Models\Counter;

class HomeController extends Controller
{
    public function index()
    {
        $berita = Berita::count();
        $buku = Buku::count();
        $views = Berita::sum('views');
        return view('admin/index', compact('buku', 'berita', 'views'));
    }
}
