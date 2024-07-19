<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailRestoController extends Controller
{
    public function index()
    {
        return view('detailresto');
    }
}
