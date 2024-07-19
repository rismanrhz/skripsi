<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // Metode lainnya

    public function index()
    {
        // Mendapatkan pengguna yang sedang login
        $userid = session('user.id');
        $pengguna = Pengguna::find($userid);

        // Mengembalikan view untuk edit profil
        return view('profil', compact('pengguna'));
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string|min:2',
            'nama_belakang' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|min:5',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $pengguna = Pengguna::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => $request->password
        ]);

        return redirect()->route('profil');
    }

    public function edit($id)
    {
        $pengguna = Pengguna::find($id);
        return view('profil.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string|min:2',
            'nama_belakang' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|min:5',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $pengguna = Pengguna::find($id);
        $pengguna->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => $request->password
        ]);

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui.');
    }
}
