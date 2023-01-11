<?php

namespace App\Http\Controllers;

use App\Constants\GlobalConstants;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Artikel;
use App\Models\Banner;
use App\Models\Kategori;
use App\Models\KaryaBuku;
use App\Models\KaryaTI;
use App\Models\KaryaTP;
use App\Models\KategoriPenulis;
use App\Models\Klipping;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class FrontendController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $artikel = Artikel::latest()->paginate(6);
        // $popular_posts = Artikel::popularWeek()->get();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();
        $kategori = Kategori::all();
        $data = array(
            "tittle" => "Beranda",
            "tittle" => "Katalog Perpustakaan",
        );
        return view('/client/index', compact('artikel', 'kategori', 'data', 'post_populer'));
    }

    public function artikel_kategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        return view('/client/artikel-kategori', compact('kategori'));
    }

    public function detail_artikel(Request $request, $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();
        $blogKey = 'blog_' . $artikel->id;
        if (!Session::has($blogKey)) {
            $artikel->increment('views');
            Session::put($blogKey, 1);
        }
        return view('/client/detailartikel', compact('artikel', 'post_populer'));
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


    public function profil(Request $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/profil', compact('artikel', 'post_populer'));
        return view('/client/profil/visimisi', compact('artikel', 'post_populer'));
    }
    public function visimisi(Request $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/visimisi', compact('artikel', 'post_populer'));
    }

    public function prestasi(Request $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/prestasi', compact('artikel', 'post_populer'));
    }

    public function layanan(Request $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/layanan', compact('artikel', 'post_populer'));
    }

    public function fasilitas(Request $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/fasilitas', compact('artikel', 'post_populer'));
    }

    public function promosi(Request $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/promosi', compact('artikel', 'post_populer'));
    }

    public function tatatertib(Request $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $post_populer = Artikel::orderBy('views', 'desc')->limit('5')->get();

        return view('/client/profil/tatatertib', compact('artikel', 'post_populer'));
    }

    // public function karyabuku(Request $request)
    // {

    //     $search = $request['search'] ?? "";
    //     if ($search != "") {
    //         //where
    //         $karyabuku = KaryaBuku::where('judul', 'LIKE', "%$search%")->latest()->paginate(15);
    //     } elseif ($request->row) {
    //         $karyabuku = KategoriPenulis::where('nama_kategori', $request->row)->firstOrFail()->karyabuku()->paginate(15);
    //     } else {
    //         $katbuk = KategoriPenulis::all();
    //         $karyabuku = KaryaBuku::all();
    //         return view('/client/karya/karya-buku', compact('karyabuku', 'search', 'katbuk'))->with('message', 'Karya yang dicari tidak ditemukan!');
    //     }

    //     $data = compact('karyabuku', 'search');
    // $buku = Buku::all();
    // $novel = Buku::where('kategori_id', 1)->first();
    //     return view('/client/karya/karya-buku')->with($data);
    // elseif ($request->kategori) {
    //$karyabuku = KategoriPenulis::where('nama_kategori', $request->kategori)->firstOrFail()->karyabuku()->paginate(10);
    // }

    public function karyabuku(Request $request)
    {
        Paginator::useBootstrap();
        $karyabuku = KaryaBuku::latest()->paginate(15);
        return view('/client/karya/karya-buku', compact('karyabuku'));
    }

    public function search_buku(Request $request)
    {
        if ($request->search) {
            $karyabuku = KaryaBuku::where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('penulis', 'like', '%' . $request->search . '%')->latest()->paginate(15);
        } else {
            $karyabuku = KaryaBuku::latest()
                ->paginate(15);
        }
        return view('/client/karya/karya-buku', compact('karyabuku'));
    }

    // public function viewkategori($slug)
    // {
    //     if (KategoriPenulis::where('slug', $slug)->exists()) {
    //         $kategori = KategoriPenulis::where('slug', $slug)->first();
    //         $karyabuku = KaryaBuku::where('kategori_id', $kategori->id)->get();
    //         return view('client/karya/karya-buku/view-kategori', compact('kategori', 'karyabuku'));
    //     } else {
    //         return redirect()->back()->with('status', 'slug tidak ada');
    //     }
    // }

    public function detail_karya_buku($slug)
    {
        $karyabuku = KaryaBuku::where('slug', $slug)->first();
        return view('/client/karya/detail-buku', compact('karyabuku'));
    }

    public function karyailmiah(Request $request)
    {
        Paginator::useBootstrap();
        $karyailmiah = KaryaTI::latest()->paginate(15);
        return view('/client/karya/karya-ilmiah', compact('karyailmiah'));
    }

    public function search_ilmiah(Request $request)
    {
        if ($request->search) {
            $karyailmiah = KaryaTI::where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('penulis', 'like', '%' . $request->search . '%')->latest()->paginate(15);
        } else {
            $karyailmiah = KaryaTI::latest()
                ->paginate(15);
        }
        return view('/client/karya/karya-ilmiah', compact('karyailmiah'));
    }

    public function detail_karya_ilmiah($slug)
    {
        $karyailmiah = KaryaTI::where('slug', $slug)->first();
        return view('/client/karya/detail-ilmiah', compact('karyailmiah'));
    }

    public function karyapublikasi()
    {
        Paginator::useBootstrap();
        $karyailmiah = KaryaTP::latest()->paginate(15);
        return view('/client/karya/karya-publikasi', compact('karyailmiah'));
    }

    public function search_publikasi(Request $request)
    {
        if ($request->search) {
            $karyapub = KaryaTP::where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('penulis', 'like', '%' . $request->search . '%')->latest()->paginate(15);
        } else {
            $karyapub = KaryaTP::latest()
                ->paginate(15);
        }
        return view('/client/karya/karya-publikasi', compact('karyapub'));
    }

    public function detail_karya_publikasi($slug)
    {
        $karyapub = KaryaTP::where('slug', $slug)->first();
        return view('/client/karya/detail-publikasi', compact('karyapub'));
    }

    public function kliping()
    {
        Paginator::useBootstrap();
        $klipping = Klipping::latest()->paginate(15);
        return view('/client/kliping/kliping', compact('klipping'));
    }

    public function search_klipping(Request $request)
    {
        if ($request->search) {
            $klipping = Klipping::where('tahun', 'like', '%' . $request->search . '%')
                ->latest()->paginate(15);
        } else {
            $klipping = Klipping::latest()
                ->paginate(15);
        }
        return view('/client/kliping/kliping', compact('klipping'));
    }
}
