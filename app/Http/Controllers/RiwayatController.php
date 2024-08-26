<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function index(){
        $id_pengguna = session('user')->id;
        $riwayat = Riwayat::where('riwayat.id_pengguna', $id_pengguna)
                            ->join('makanan','riwayat.id_menu', '=', 'makanan.id' )
                            ->join('restaurant', 'makanan.id_resto', '=', 'restaurant.id')
                            ->get([
                                'riwayat.kecamatan as kecamatan',
                                'riwayat.budget as budget',
                                'restaurant.nama as nama_restaurant', 
                                'makanan.harga as harga',
                                'makanan.nama_menu as nama_menu'
                            ]);
        // dd($riwayat);
        return view('riwayat', ['riwayat' => $riwayat]);
    }
}
