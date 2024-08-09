<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\Restoran;
use Illuminate\Support\Facades\Validator;

class DaftarRestoController extends Controller
{
    public function index()
    {
        return view('daftarresto');
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
            'detail_alamat' => 'required|string',
            'jam' => 'required|string',
            'rating' => 'required|numeric',
            'google_maps_link' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $imageName = time().'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path('resto'), $imageName);

        $resto = Restoran::create([
            'id_pengguna' => $request->userid,
            'nama' => $request->nama,
            'kecamatan' => $request->kecamatan,
            'detail_alamat' => $request->detail_alamat,
            'jam' => $request->jam,
            'rating' => $request->rating,
            'image' => $imageName,
            'google_maps_link' => $request->google_maps_link,
        ]);

        if($resto){
            $pengguna = Pengguna::find($request->userid);
            $pengguna->update([
                'status' => 2
            ]);
            session('user')->status = 2;
        }

        return redirect()->route('dashboard');
    }

    public function edit($id) 
    {
        $resto = Restoran::find($id);

        return view('kelolaresto', compact('resto'));
    }

    public function update(Request $request, $id) 
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3',
            'kecamatan' => 'required|string',
            'detail_alamat' => 'required|string',
            'jam' => 'required|string',
            'rating' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'google_maps_link' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $resto = Restoran::find($id);

        if ($request->hasFile('image')) {
            $imageName = time().'-'.$request->image->getClientOriginalName();
            $request->image->move(public_path('daftarresto'), $imageName);
            $resto->image = $imageName;
        }

        $resto->update([
            'nama' => $request->nama,
            'kecamatan' => $request->kecamatan,
            'detail_alamat' => $request->detail_alamat,
            'jam' => $request->jam,
            'rating' => $request->rating,
            'google_maps_link' => $request->google_maps_link,
        ]);

        return redirect()->route('daftarresto');
    }    
}
