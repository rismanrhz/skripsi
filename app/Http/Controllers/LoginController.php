<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Pengguna;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {

        $user = Pengguna::where('email', $request->email)->first();
        if(!$user || $user->password != $request->password){
            return redirect()->back()->with('error', 'Email atau password salah');
        }
        if($user->status == 1 || $user->status == 2){
            session(['user' => $user]);
            return redirect()->route('dashboard');
        } else if($user->status == 3){
            session(['user' => $user]);
            return redirect()->route('admin');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}