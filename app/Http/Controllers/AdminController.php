<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $admin = User::all();
        return view('admin/admin', compact('admin'));
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            // dd($data);

            User::where(['user_id' => $id])->update(['name' => $data['name'], 'email' => $data['email']]);
            return redirect()->back()->with('success', 'Admin Berhasil Diubah!');
        }
    }

    public function delete($id = null)
    {
        User::where(['user_id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'Data Admin berhasil Dihapus!');
    }
}
