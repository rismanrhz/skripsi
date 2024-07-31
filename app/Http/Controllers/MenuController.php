<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($id) {
        $id_resto = $id;
        return view('admin/menu', compact('id_resto'));
    }

    public function create(){
        
    }

}
