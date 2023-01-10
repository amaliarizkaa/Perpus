<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $katbuk = KategoriBuku::all();
        return view('/admin/buku/index', compact('buku', 'katbuk'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'callnum' => 'required|max:10',
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'penerbit' => 'required|max:150',
            'tahun' => 'required',
            'jumlah' => 'nullable',
            'kategori_id' => 'nullable',
            'subjek' => 'nullable',
            'deskripsi' => 'required|max:3000',
            'gambar_buku' => 'nullable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['is_active'] = 1;
        $data['gambar_buku'] = $request->file('gambar_buku')->store('buku');

        Buku::create($data);

        return redirect('/buku')->with('success', 'Buku Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        if (empty($request->file('gambar_buku'))) {

            $buku = Buku::find($id);
            $buku->update([
                'callnum' => $request->callnum,
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tahun' => $request->tahun,
                'jumlah' => $request->jumlah,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'subjek' => $request->subjek,
                'is_active' => $request->is_active,
            ]);
            return redirect()->back()->with('success', 'Buku Berhasil Diubah!');
        } else {
            $buku = Buku::find($id);
            Storage::delete($buku->gambar_buku);
            $buku->update([
                'callnum' => $request->callnum,
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tahun' => $request->tahun,
                'jumlah' => $request->jumlah,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'subjek' => $request->subjek,
                'is_active' => $request->is_active,
                'gambar_buku' => $request->file('gambar_buku')->store('buku')
            ]);
            return redirect()->back()->with('success', 'Buku Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        $buku = Buku::find($id);
        Storage::delete($buku->gambar_buku);
        Buku::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
