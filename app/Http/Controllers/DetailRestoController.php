<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Restoran;

class DetailRestoController extends Controller
{

    public function index($id_resto) 
    {
        $resto = Restoran::where('id', $id_resto)->get(['nama']);
        $menus = Menu::where('id_resto', $id_resto)->get();
        return view('daftar-menu', compact('menus', 'resto'));
    }

    
}
