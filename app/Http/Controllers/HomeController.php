<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Buku;
<<<<<<< HEAD
use App\Models\Karyabuku;
=======
use App\Models\KaryaBuku;
>>>>>>> 7e422aa440e16a0cfdd1688bf921398fc56f89db
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
<<<<<<< HEAD
        $karyabuku = Karyabuku::count();
=======
        $karyabuku = KaryaBuku::count();
>>>>>>> 7e422aa440e16a0cfdd1688bf921398fc56f89db
        $karyailmiah = KaryaTI::count();
        $karyapub = KaryaTP::count();
        $klipping = Klipping::count();
        $counter = Counter::sum('counts');
        return view('admin/index', compact('buku', 'artikel', 'views', 'karyabuku', 'karyailmiah', 'karyapub', 'klipping', 'counter'));
    }
}
