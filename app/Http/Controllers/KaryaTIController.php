<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryaTI;
use App\Models\KategoriPenulis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KaryaTIController extends Controller
{
    public function index()
    {
        $karyailmiah = KaryaTI::all();
        $katbuk = KategoriPenulis::all();
        return view('/admin/karya/karyaTI', compact('karyailmiah', 'katbuk'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|max:200',
            'callnum' => 'required|max:10',
            'penulis' => 'required|max:100',
            'penerbit' => 'required|max:150',
            'subjek' => 'required|max:150',
            'tahun' => 'required|max:4',
            'jumlah' => 'nullable',
            'halaman' => 'nullable',
            'kategori_id' => 'required',
            'deskripsi' => 'required|max:3000',
            'gambar_karya' => 'nullable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['gambar_karya'] = $request->file('gambar_karya')->store('karya');

        KaryaTI::create($data);

        return redirect('/admin/karya-ilmiah')->with('success', 'Karya Ilmiah Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        if (empty($request->file('gambar_karya'))) {

            $karyailmiah = KaryaTI::find($id);
            $karyailmiah->update([
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
            ]);
            return redirect()->back()->with('success', 'Karya Ilmiah Berhasil Diubah!');
        } else {
            $karyailmiah = KaryaTI::find($id);
            Storage::delete($karyailmiah->gambar_karya);
            $karyailmiah->update([
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
            return redirect()->back()->with('success', 'Karya Ilmiah Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        $karyailmiah = KaryaTI::find($id);
        Storage::delete($karyailmiah->gambar_karya);
        KaryaTI::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
