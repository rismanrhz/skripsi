<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class DetailRestoController extends Controller
{

    public function index($id_resto) 
    {
        $menus = Menu::where('id_resto', $id_resto)->get();
        return view('daftar-menu', compact('menus'));
    }

    
}
