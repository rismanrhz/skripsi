<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restoran;

class MenuRestoranController extends Controller
{
    public function index()
    {
        // Fetch all restaurants from the database
        $resto = Restoran::all();

        // Pass the data to the view
        return view('menurestoran', compact('resto'));
    }
}
