<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarrestoController extends Controller
{
    public function index()
    {
        return view('daftarresto');
    }
}
