<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all(); 
        return view('admin/pengguna', compact('pengguna'));
    }

    public function create()
    {
        // $pengguna = Pengguna::all();
        return view('admin/tambahpengguna');
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string|min:2',
            'nama_belakang' => 'required|string',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $pengguna = Pengguna::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ]);

        return redirect()->route('pengguna');
    }

    public function edit($id)
    {
        $pengguna = Pengguna::find($id);
        
        return view('admin/ubahpengguna', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string|min:2',
            'nama_belakang' => 'required|string',
            'email' => 'required|email|unique:pengguna,email',
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
            'password' => $request->password,
        ]);

        return redirect()->route('pengguna');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->delete();

        return redirect()->route('pengguna');
    }
}