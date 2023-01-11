<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryaTP;
use App\Models\KategoriPenulis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KaryaTPController extends Controller
{
    public function index()
    {
        $karyailmiah = KaryaTP::all();
        $katbuk = KategoriPenulis::all();
        return view('/admin/karya/karyaTP', compact('karyailmiah', 'katbuk'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|max:200',
            'judul_terbit' => 'required|max:200',
            'edisi' => 'required|max:200',
            'penulis' => 'required|max:100',
            'penerbit' => 'required|max:150',
            'halaman' => 'nullable',
            'kategori_id' => 'required',
            'gambar_buku' => 'nullable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['gambar_karya'] = $request->file('gambar_karya')->store('karya');

        KaryaTP::create($data);

        return redirect('/admin/karya-publikasi')->with('success', 'Karya Terpublikasi Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        if (empty($request->file('gambar_karya'))) {

            $karyailmiah = KaryaTP::find($id);
            $karyailmiah->update([
                'judul' => $request->judul,
                'judul_terbit' => $request->judul_terbit,
                'edisi' => $request->edisi,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'halaman' => $request->halaman,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
            ]);
            return redirect()->back()->with('success', 'Karya Ilmiah Berhasil Diubah!');
        } else {
            $karyailmiah = KaryaTP::find($id);
            Storage::delete($karyailmiah->gambar_karya);
            $karyailmiah->update([
                'judul' => $request->judul,
                'judul_terbit' => $request->judul_terbit,
                'edisi' => $request->edisi,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'halaman' => $request->halaman,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'gambar_karya' => $request->file('gambar_karya')->store('karya')
            ]);
            return redirect()->back()->with('success', 'Karya Ilmiah Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        $karyailmiah = KaryaTP::find($id);
        Storage::delete($karyailmiah->gambar_karya);
        KaryaTP::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
