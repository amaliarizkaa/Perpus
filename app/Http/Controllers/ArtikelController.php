<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        $kategori = Kategori::all();
        return view('/admin/artikel/index', compact('artikel', 'kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|max:100',
            'body' => 'required|max:2000',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');

        Artikel::create($data);

        return redirect('/artikel')->with('success', 'Artikel Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        if (empty($request->file('gambar_artikel'))) {

            $artikel = Artikel::find($id);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
            ]);
            return redirect()->back()->with('success', 'Artikel Berhasil Diubah!');
        } else {
            $artikel = Artikel::find($id);
            Storage::delete($artikel->gambar_artikel);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel')
            ]);
            return redirect()->back()->with('success', 'Artikel Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        $artikel = Artikel::find($id);
        Storage::delete($artikel->gambar_artikel);
        Artikel::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
