<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestomuController extends Controller
{
    public function index()
    {
        return view('pemilik/restomu');
    }
}
