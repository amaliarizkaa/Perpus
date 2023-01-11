<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return view('admin/banner/index', compact('banner'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_banner' => 'nullable|min:2',
            'gambar_banner' => 'required',
            'link' => 'nullable',
        ]);

        $data = $request->all();
        $data['nama_banner'] = $request->nama_banner;
        $data['gambar_banner'] = $request->file('gambar_banner')->store('banner');
        $data['link'] = $request->link;

        Banner::create($data);

        return redirect('/admin/daftar-banner')->with('success', 'Gambar Banner Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        if (empty($request->file('gambar_banner'))) {

            $banner = Banner::find($id);
            $banner->update([
                'nama_banner' => $request->nama_banner,
                'link' => $request->link,
                'status' => $request->status,
            ]);
            return redirect()->back()->with('success', 'Gambar Banner Berhasil Diubah!');
        } else {
            $banner = Banner::find($id);
            Storage::delete($banner->gambar_banner);
            $banner->update([
                'nama_banner' => $request->nama_banner,
                'link' => $request->link,
                'status' => $request->status,
                'gambar_banner' => $request->file('gambar_banner')->store('banner')
            ]);
            return redirect()->back()->with('success', 'Gambar Banner Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        $banner = Banner::find($id);
        Storage::delete($banner->gambar_banner);
        Banner::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'Gambar Banner Berhasil Dihapus!');
    }
}
