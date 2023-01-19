<?php

namespace App\Http\Controllers;

use App\Models\Klipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KlippingController extends Controller
{
    public function index()
    {
        $klipping = Klipping::all();
        return view('/admin/klipping/index', compact('klipping'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'required|max:4',
            'gambar_klipping' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['gambar_klipping'] = $request->file('gambar_klipping')->store('klipping');

        Klipping::create($data);

        return redirect('/admin/klipping')->with('success', 'Klipping Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        if (empty($request->file('gambar_klipping'))) {

            $klipping = Klipping::find($id);
            $klipping->update([
                'tahun' => $request->tahun,
            ]);
            return redirect()->back()->with('success', 'Klipping Berhasil Diubah!');
        } else {
            $klipping = Klipping::find($id);
            Storage::delete($klipping->gambar_klipping);
            $klipping->update([
                'tahun' => $request->tahun,
                'gambar_klipping' => $request->file('gambar_klipping')->store('klipping')
            ]);
            return redirect()->back()->with('success', 'Klipping Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        $klipping = Klipping::find($id);
        Storage::delete($klipping->gambar_klipping);
        Klipping::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
