<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(session('user')->status == 2){
            $id = session('user')->id;
            $resto = Restoran::where('id_pengguna', $id)->first();
            // dd($resto);
        }
        return view('index', compact('resto'));
    }
}
