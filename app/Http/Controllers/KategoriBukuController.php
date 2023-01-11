<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $katbuk = KategoriBuku::all();
        return view('admin/buku/kategori', compact('katbuk'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:2',
        ]);

        $katbuk = KategoriBuku::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect('/buku/kategoribuk')->with('success', 'Kategori Buku Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        // dd($data);

        KategoriBuku::where(['id' => $id])->update(['nama_kategori' => $data['nama_kategori'], 'slug' => $data['slug']]);

        return redirect()->back()->with('success', 'Kategori Buku Berhasil Diubah!');
    }

    public function delete($id = null)
    {
        // $artikel = Artikel::find($id);
        // Storage::delete($artikel->gambar_artikel);
        KategoriBuku::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'Kategori Buku Berhasil Dihapus!');
    }
}
