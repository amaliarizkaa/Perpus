<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('/admin/berita/index', compact('berita'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|max:1000',
            'body' => 'required',
            'gambar_berita' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['gambar_berita'] = $request->file('gambar_berita')->store('berita');

        Berita::create($data);

        return redirect('/berita')->with('success', 'Berita Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        if (empty($request->file('gambar_berita'))) {

            $berita = Berita::find($id);
            $berita->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                // 'kategori_id' => $request->kategori_id,
            ]);
            return redirect()->back()->with('success', 'Berita Berhasil Diubah!');
        } else {
            $berita = Berita::find($id);
            Storage::delete($berita->gambar_berita);
            $berita->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                // 'kategori_id' => $request->kategori_id,
                'gambar_berita' => $request->file('gambar_berita')->store('berita')
            ]);
            return redirect()->back()->with('success', 'Berita Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        $berita = Berita::find($id);
        Storage::delete($berita->gambar_berita);
        Berita::where(['berita_id' => $id])->delete();
        return redirect()->back();
    }
}
