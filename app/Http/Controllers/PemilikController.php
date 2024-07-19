<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::all(); 
        return view('admin/pemilik', compact('pemilik'));
    }

    public function create()
    {
        $pemilik = Pemilik::all();
        return view('admin/tambahpemilik', compact('pemilik'));
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:2',
            'resto' => 'required|string',
            'telepon' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $pemilik = Pemilik::create([
            'nama' => $request->nama,
            'resto' => $request->resto,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('pemilik');
    }

    public function edit($id)
    {
        $pemilik = Pemilik::find($id);
        
        return view('admin/ubahpemilik', compact('pemilik'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:2',
            'resto' => 'required|string',
            'telepon' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $pemilik = Pemilik::find($id);
        $pemilik->update([
            'nama' => $request->nama,
            'resto' => $request->resto,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('pemilik');
    }

    public function destroy($id)
    {
        $pemilik = Pemilik::find($id);
        $pemilik->delete();

        return redirect()->route('pemilik');
    }
}