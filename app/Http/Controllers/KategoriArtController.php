<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KategoriArtController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin/artikel/kategoriArt', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:2',
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect('/kategoriart')->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        // dd($data);

        Kategori::where(['id' => $id])->update(['nama_kategori' => $data['nama_kategori'], 'slug' => $data['slug']]);

        return redirect()->back()->with('success', 'Kategori Berhasil Diubah!');
    }

    public function delete($id = null)
    {
        // $artikel = Artikel::find($id);
        // Storage::delete($artikel->gambar_artikel);
        Kategori::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'Kategori Berhasil Dihapus!');
    }
}
