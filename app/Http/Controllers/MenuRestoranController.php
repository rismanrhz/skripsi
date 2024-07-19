<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuRestoranController extends Controller
{
    public function index()
    {
        return view('menurestoran');
    }
}
