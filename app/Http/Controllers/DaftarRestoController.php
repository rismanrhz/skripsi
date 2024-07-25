<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DaftarrestoController extends Controller
{
    public function index()
    {
        $daftarresto = Restoran::all();
        return view('daftarresto', compact('daftarresto'));
    }

    public function create()
    {
        return view('daftarresto');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3',
            'kecamatan' => 'required|string',
            'alamat' => 'required|string',
            'jam' => 'required|string',
            'rating' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $daftarresto = Restoran::create([
            'id_pengguna' => 1,
            'nama' => $request->nama,
            'kecamatan' => $request->kecamatan,
            'detail_alamat' => $request->detail_alamat,
            'jam' => $request->jam,
            'rating' => $request->rating,
        ]);
    }
}
