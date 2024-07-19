<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|string|min:2',
            'nama_belakang' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $store = Pengguna::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ]);

        return redirect()->route('login');

        if($store) {
            return redirect()->route('login')->with('success', 'Register berhasil, silahkan login');
        } else {
            return redirect()->back()->with('error', 'Register gagal, silahkan coba lagi');
        }
    }
}