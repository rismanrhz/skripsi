<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Restaurant;

class GenetikaController extends Controller
{
    public function index() {
        $budget = 30000;
        $kecamatan = 'genteng';
        // inisialisasi Populasi
        $populasi = $this->inisialisasiPopulasi($budget, $kecamatan);
        
        // evaluasi fitnes
        $fitnessPopulasi = $this->evaluasiFitness($populasi, $budget);
        
        // seleksi orangtua
        $orangtua = $this->seleksiOrangtua($fitnessPopulasi);
        
        dd($orangtua);
        // $anak = $this->crossover($orangtua);
        // return $populasi;
    }

    public function inisialisasiPopulasi($budget, $kecamatan)
    {
        $menuItems = Menu::where('makanan.harga', '<=', $budget)
                        ->join('restaurant', 'makanan.id_resto', '=', 'restaurant.id')
                        ->where('restaurant.kecamatan', $kecamatan)
                        ->get(['makanan.*', 'restaurant.nama as nama_restaurant'])
                        ->toArray();

        // Mengelompokkan hasil berdasarkan id_resto
        $groupedMenu = [];
        foreach ($menuItems as $item) {
            $groupedMenu[$item['id_resto']][] = $item;
        }

        return $groupedMenu;
    }


    public function evaluasiFitness($populasi, $budget)
    {
        return array_map(function ($group) {
            $totalFitness = 0;
            $count = count($group);

            // Menghitung fitness untuk setiap item dalam grup
            $group = array_map(function ($individu) use (&$totalFitness) {
                $individu['fitness'] = 1 / $individu['harga'];
                $totalFitness += $individu['fitness'];
                return $individu;
            }, $group);

            // Menghitung rata-rata fitness untuk grup
            $averageFitness = $count > 0 ? $totalFitness / $count : 0;

            // Menambahkan rata-rata fitness ke grup
            $group['average_fitness'] = $averageFitness;

            return $group;
        }, $populasi);
    }

    public function seleksiOrangtua($fitnessPopulasi)
    {
        $totalGroups = count($fitnessPopulasi);
        $k = 3;

        // Jika jumlah grup kurang dari atau sama dengan 3, ambil semua grup
        if ($totalGroups <= $k) {
            $turnamen = array_keys($fitnessPopulasi);
        } else {
            // Pilih 3 grup secara acak
            $turnamen = array_rand($fitnessPopulasi, $k);
        }

        // Cari grup dengan nilai average_fitness tertinggi
        $bestGroupIndex = null;
        $bestAverageFitness = -INF;

        foreach ((array)$turnamen as $index) {
            $currentGroup = $fitnessPopulasi[$index];
            $averageFitness = $currentGroup['average_fitness'];

            if ($averageFitness > $bestAverageFitness) {
                $bestAverageFitness = $averageFitness;
                $bestGroupIndex = $index;
            }
        }

        // Kembalikan grup dengan average_fitness tertinggi
        return $fitnessPopulasi[$bestGroupIndex];
    }


    // public function crossover($orangtua)
    // {
    //     // Implementasi crossover sederhana
    //     $titikCrossover = rand(0, count($orangtua['harga']) - 1);
    //     $anak = $orangtua;
    //     $anak['harga'] = $orangtua['harga'];
    //     return $anak;
    // }

}
