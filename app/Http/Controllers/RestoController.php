<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Restoran;
use Illuminate\Support\Facades\Validator;

class RestoController extends Controller
{
    public function index()
    {
        $resto = Restoran::all(); 
        return view('admin/resto', compact('resto'));
    }

    public function create()
    {
        $resto = Restoran::all();
        return view('admin/tambahresto', compact('resto'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jam' => 'required|string',
            'rating' => 'required|numeric',
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
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'jam' => $request->jam,
            'rating' => $request->rating,
            'image' => $imageName,
        ]);

        return redirect()->route('resto');
    }

    public function edit($id) {
        $resto = Restoran::find($id);

        return view('admin/ubahresto', compact('resto'));
    }

    public function update(Request $request, $id) 
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jam' => 'required|string',
            'rating' => 'required|numeric',
            'image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $resto = Restoran::find($id);
        $resto->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'jam' => $request->jam,
            'rating' => $request->rating,
            'image' => $request->image,
        ]);
        return redirect()->route('resto');
    }

    public function destroy($id) {
        $resto = Restoran::find($id);
        $resto->delete();

        return redirect()->route('resto');
    }
}