<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::all();
        return view('/admin/profil/index', compact('profil'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        Profil::create($data);

        return redirect('/admin/profil')->with('success', 'Data Profile Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $profile = Profil::find($id);
        $profile->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('success', 'Data Profile Berhasil Diubah!');
    }

    public function delete($id = null)
    {
        $profil = Profil::find($id);
        Profil::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
