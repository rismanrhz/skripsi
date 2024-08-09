<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Restoran;
use Illuminate\Support\Facades\Validator;

class RestoController extends Controller
{
    public function index()
    {
        $id = session('user')->id;
        if (session('user')->status == 2) {
            $resto = Restoran::where('id_pengguna',$id)->first();
        }else{
            $resto = Restoran::all(); 
        }
        return view('admin/resto', compact('resto'));
    }

    public function create()
    {
        //$resto = Restoran::all();
        return view('admin/tambahresto');
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
        // dd($request->image);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        // dd($request->image);
        $imageName = time().'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path('resto'), $imageName);

        Restoran::create([
            'id_pengguna' => 1,
            'nama' => $request->nama,
            'kecamatan' => $request->kecamatan,
            'detail_alamat' => $request->detail_alamat,
            'jam' => $request->jam,
            'rating' => $request->rating,
            'image' => $imageName,
            'google_maps_link' => $request->google_maps_link,
        ]);

        return redirect()->route('resto');
    }

    public function edit($id) 
    {
        $resto = Restoran::find($id);

        return view('admin/ubahresto', compact('resto'));
    }

    public function update(Request $request, $id) 
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

        $resto = Restoran::find($id);
        $imageName = time().'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path('resto'), $imageName);
        $resto->update([
            'id_pengguna' => 1,
            'nama' => $request->nama,
            'kecamatan' => $request->kecamatan,
            'detail_alamat' => $request->detail_alamat,
            'jam' => $request->jam,
            'rating' => $request->rating,
            'image' => $imageName,
            'google_maps_link' => $request->google_maps_link,
        ]);
        return redirect()->route('resto');
    }

    public function destroy($id) {
        $resto = Restoran::find($id);
        $resto->delete();

        return redirect()->route('resto');
    }
}