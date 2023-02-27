<?php

namespace App\Http\Controllers;

use App\Models\KaryaBuku;
use App\Models\KategoriPenulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreKaryaBukuRequest;
use App\Http\Requests\UpdateKaryaBukuRequest;

class KaryaBukuController extends Controller
{
    public function index()
    {
        $karyabuku = KaryaBuku::all();
        $katbuk = KategoriPenulis::all();
        return view('/admin/karya/karyabuku', compact('karyabuku', 'katbuk'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|max:1000',
            'callnum' => 'required|max:100',
            'penulis' => 'required|max:100',
            'penerbit' => 'required|max:150',
            'subjek' => 'required|max:150',
            'tahun' => 'required|max:4',
            'jumlah' => 'nullable',
            'halaman' => 'nullable',
            'kategori_id' => 'required',
            'deskripsi' => 'required|max:3000',
            'gambar_buku' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['gambar_karya'] = $request->file('gambar_karya')->store('karya');

        KaryaBuku::create($data);

        return redirect('/admin/karya-buku')->with('success', 'Karya Buku Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        if (empty($request->file('gambar_karya'))) {

            $karyabuku = KaryaBuku::find($id);
            $karyabuku->update([
                'judul' => $request->judul,
                'callnum' => $request->callnum,
                'penulis' => $request->penulis,
                'tahun' => $request->tahun,
                'penerbit' => $request->penerbit,
                'subjek' => $request->subjek,
                'jumlah' => $request->jumlah,
                'halaman' => $request->halaman,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
            ]);
            return redirect()->back()->with('success', 'Karya Buku Berhasil Diubah!');
        } else {
            $karyabuku = KaryaBuku::find($id);
            Storage::delete($karyabuku->gambar_karya);
            $karyabuku->update([
                'judul' => $request->judul,
                'callnum' => $request->callnum,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'subjek' => $request->subjek,
                'tahun' => $request->tahun,
                'jumlah' => $request->jumlah,
                'halaman' => $request->halaman,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'gambar_karya' => $request->file('gambar_karya')->store('karya')
            ]);
            return redirect()->back()->with('success', 'Karya Buku Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        $karyabuku = KaryaBuku::find($id);
        Storage::delete($karyabuku->gambar_karya);
        Karyabuku::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
