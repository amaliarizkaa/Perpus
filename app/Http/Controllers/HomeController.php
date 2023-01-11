<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Buku;
use App\Models\Karyabuku;
use App\Models\KaryaTI;
use App\Models\KaryaTP;
use App\Models\Klipping;
use App\Models\Counter;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = Artikel::count();
        $buku = Buku::count();
        $views = Artikel::sum('views');
        $karyabuku = Karyabuku::count();
        $karyailmiah = KaryaTI::count();
        $karyapub = KaryaTP::count();
        $klipping = Klipping::count();
        $counter = Counter::sum('counts');
        return view('admin/index', compact('buku', 'artikel', 'views', 'karyabuku', 'karyailmiah', 'karyapub', 'klipping', 'counter'));
    }
}
