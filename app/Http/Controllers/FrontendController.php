<?php

namespace App\Http\Controllers;

use App\Constants\GlobalConstants;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Berita;
use App\Models\Banner;
use App\Models\Kategori;
use App\Models\KaryaBuku;
use App\Models\KaryaTI;
use App\Models\KaryaTP;
use App\Models\KategoriPenulis;
use App\Models\Klipping;
use App\Models\Profil;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class FrontendController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $berita = Berita::latest()->paginate(6);
        // $popular_posts = berita::popularWeek()->get();
        $post_newest = Berita::orderBy('created_at', 'desc')->limit('5')->get();
        $data = array(
            "tittle" => "Beranda",
            "tittle" => "Katalog Buku",
        );
        return view('/client/index', compact('berita', 'data', 'post_newest'));
    }

    public function detail_berita(Request $request, $slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $post_newest = Berita::orderBy('created_at', 'desc')->limit('5')->get();
        // $blogKey = 'blog_' . $berita->id;
        // if (!Session::has($blogKey)) {
        //     $berita->increment('views');
        //     Session::put($blogKey, 1);
        // }
        return view('/client/detailberita', compact('berita', 'post_newest'));
    }

    public function katalog(Request $request)
    {
        Paginator::useBootstrap();
        $buku = Buku::latest()->paginate(15);
        return view('/client/katalog/index', compact('buku'));
    }

    public function search_katalog(Request $request)
    {
        if ($request->search) {
            $buku = Buku::where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('pengarang', 'like', '%' . $request->search . '%')->latest()->paginate(15);
        } else {
            $buku = Buku::latest()
                ->paginate(15);
        }
        return view('/client/katalog/index', compact('buku'));
    }

    public function detail_katalog($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        return view('/client/katalog/detail', compact('buku'));
    }


    // public function profil(Request $slug)
    // {
    //     $berita = berita::where('slug', $slug)->first();
    //     $post_populer = berita::orderBy('views', 'desc')->limit('5')->get();

    //     return view('/client/profil/profil', compact('berita', 'post_populer'));
    //     return view('/client/profil/visimisi', compact('berita', 'post_populer'));
    // }
    public function profil(Request $slug)
    {
        $profil = Profil::all();
        return view('/client/profil/profil', compact('profil'));
    }
    public function visimisi(Request $slug)
    {
        $berita = berita::where('slug', $slug)->first();
        $post_populer = berita::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/visimisi', compact('berita', 'post_populer'));
    }

    public function prestasi(Request $slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $post_populer = Berita::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/prestasi', compact('berita', 'post_populer'));
    }

    public function layanan(Request $slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $post_populer = Berita::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/layanan', compact('berita', 'post_populer'));
    }

    public function fasilitas(Request $slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $post_populer = Berita::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/fasilitas', compact('berita', 'post_populer'));
    }

    public function promosi(Request $slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $post_populer = Berita::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/promosi', compact('berita', 'post_populer'));
    }

    public function tatatertib(Request $slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $post_populer = Berita::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/tatatertib', compact('berita', 'post_populer'));
    }
}
