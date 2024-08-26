<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Riwayat;

class GenetikaController extends Controller
{
    public function rekomendasi()
    {
        return view('recommendation_form');
    }
    public function index(Request $request) {
        $budget = $request->budget;
        $kecamatan = $request->kecamatan;
        $id_pengguna = session('user')->id;
        
        // inisialisasi Populasi
        $populasi = $this->inisialisasiPopulasi($budget, $kecamatan);
        
        // evaluasi fitnes
        $fitnessPopulasi = $this->evaluasiFitness($populasi, $budget);
        
        // seleksi orangtua
        $orangtua = $this->seleksiOrangtua($fitnessPopulasi);

        //crossover
        $anak = $this->crossover($orangtua);

        //Mutasi
        $anak = $this->mutasi($anak);

        //Evaluasi Keturunan
        $evaluasiKeturunan = $this->evaluasiKeturunan($anak, $budget);

        // Seleksi final
        $recommend = $this->seleksiFinal($evaluasiKeturunan);
        // dd($recommend);

        $riwayat = $this->riwayat($recommend, $id_pengguna, $budget, $kecamatan);
        // dd($riwayat);

        return view('rekomendasi', compact('recommend'));
    }

    public function inisialisasiPopulasi($budget, $kecamatan)
    {
        $menuItems = Menu::where('makanan.harga', '<=', $budget)
                        ->join('restaurant', 'makanan.id_resto', '=', 'restaurant.id')
                        ->where('restaurant.kecamatan', $kecamatan)
                        ->where('makanan.kategori_menu', 'makanan')
                        ->get(['makanan.*', 'restaurant.nama as nama_restaurant', 'restaurant.google_maps_link as lokasi'])
                        ->toArray();

        // Mengelompokkan hasil berdasarkan id_resto
        $groupedMenu = [];
        foreach ($menuItems as $item) {
            $groupedMenu[$item['id_resto']][] = $item;
        }

        return $groupedMenu;
    }

    public function evaluasiFitness($populasi)
    {
        $fitnessPopulasi = [];

        foreach ($populasi as $idResto => $group) {
            if (!is_array($group)) {
                continue;
            }

            $totalFitness = 0;
            $count = count($group);

            foreach ($group as $individu) {
                if (!is_array($individu) || !isset($individu['harga'])) {
                    continue;
                }

                $individu['fitness'] = 1 / $individu['harga'];
                $totalFitness += $individu['fitness'];
                $fitnessPopulasi[$idResto][] = $individu;
            }

            $averageFitness = $count > 0 ? $totalFitness / $count : 0;

            // Tambahkan rata-rata fitness sebagai elemen terpisah
            $fitnessPopulasi[$idResto]['average_fitness'] = $averageFitness;
        }

        return $fitnessPopulasi;
    }

    public function seleksiOrangtua($fitnessPopulasi)
    {
        $totalGroups = count($fitnessPopulasi);
        $k = 3;
    
        $selectedParents = [];
    
        for ($i = 0; $i < 2; $i++) { // Loop dua kali untuk mendapatkan dua orang tua
            if ($totalGroups <= $k) {
                $turnamen = array_keys($fitnessPopulasi);
            } else {
                $turnamen = array_rand($fitnessPopulasi, $k);
                if (!is_array($turnamen)) {
                    $turnamen = [$turnamen]; // jika hanya satu item, ubah menjadi array
                }
            }
    
            $bestGroupIndex = null;
            $bestAverageFitness = -INF;
    
            foreach ($turnamen as $index) {
                if (in_array($index, $selectedParents)) {
                    continue; // Jangan pilih orang tua yang sudah dipilih sebelumnya
                }
    
                $currentGroup = $fitnessPopulasi[$index];
                $averageFitness = $currentGroup['average_fitness'] ?? 0;
    
                if ($averageFitness > $bestAverageFitness) {
                    $bestAverageFitness = $averageFitness;
                    $bestGroupIndex = $index;
                }
            }
    
            if ($bestGroupIndex !== null) {
                $selectedParents[] = $bestGroupIndex;
            }
        }
    
        $selectedOrangtua = [];
        foreach ($selectedParents as $parentIndex) {
            if (isset($fitnessPopulasi[$parentIndex])) {
                $selectedOrangtua[] = $fitnessPopulasi[$parentIndex];
            }
        }
    
        return $selectedOrangtua;
    }
    
    public function crossover($orangtua, $probabilitasCrossover = 0.5)
    {
        $anak = [];
    
        if (count($orangtua) < 2) {
            return $anak; // Tidak ada crossover jika jumlah orangtua kurang dari 2
        }
        if (mt_rand() / mt_getrandmax() > $probabilitasCrossover) {
            // Tidak melakukan crossover jika nilai acak lebih besar dari probabilitas crossover
            return $orangtua;
        }
    
        $individu1 = $orangtua[0];
        $individu2 = $orangtua[1];
    
        // Memastikan bahwa kedua individu (orangtua) memiliki jumlah gen yang sama
        $jumlahGen = min(count($individu1), count($individu2));
    
        // Pilih titik crossover secara acak
        $crossoverPoint = rand(1, $jumlahGen - 1);
    
        // Membuat anak baru dengan rekombinasi gen dari orang tua
        $child1 = array_merge(
            array_slice($individu1, 0, $crossoverPoint),
            array_slice($individu2, $crossoverPoint)
        );
    
        $child2 = array_merge(
            array_slice($individu2, 0, $crossoverPoint),
            array_slice($individu1, $crossoverPoint)
        );
    
        $validAnak = [];
        $validAnak[] = $child1;
        $validAnak[] = $child2;
    
        return $validAnak;
    }
        
    public function mutasi($anak, $probabilitasMutasi = 0.1)
    {
        foreach ($anak as &$individu) {
            foreach ($individu as &$gen) {
                if (is_array($gen) && isset($gen['harga']) && mt_rand() / mt_getrandmax() < $probabilitasMutasi) {
                    // Contoh mutasi: mengubah harga secara acak dalam rentang tertentu
                    $gen['harga'] = $gen['harga'] + rand(-5000, 5000);
                    // Pastikan harga tidak negatif
                    $gen['harga'] = max(0, $gen['harga']);
                }
            }
        }
        return $anak;
    }


    public function evaluasiKeturunan($anak, $budget)
    {
        $evaluasiKeturunan = [];
        
        foreach ($anak as $individu) {
            $totalFitness = 0;
    
            // Hitung fitness dan validasi setiap item
            foreach ($individu as $item) {
                if (is_array($item) && isset($item['harga'])) {
                    
                    $totalFitness += 1 / floatval($item['harga']); // Fitness dihitung sebagai 1 / harga
                }
            }
    
            $evaluasiKeturunan[] = [
                'individu' => $individu,
                'total_fitness' => $totalFitness
            ];
        }
        
        return $evaluasiKeturunan;
    }    

    public function seleksiFinal($evaluasiKeturunan)
    {
        $bestMenus = [];
        $restaurantSet = [];

        // Sortir berdasarkan fitness terbaik
        usort($evaluasiKeturunan, function ($a, $b) {
            return $b['total_fitness'] <=> $a['total_fitness'];
        });

        foreach ($evaluasiKeturunan as $evaluasi) {
            foreach ($evaluasi['individu'] as $item) {
                // Pastikan bahwa $item adalah array dan memiliki kunci 'id_resto'
                if (is_array($item) && isset($item['id_resto']) && !in_array($item['id_resto'], $restaurantSet)) {
                    $bestMenus[] = $item;
                    $restaurantSet[] = $item['id_resto'];
                }
                
                if (count($bestMenus) == 2) {
                    return $bestMenus; // Keluar setelah mendapatkan dua menu dari dua restoran berbeda
                }
            }
        }
        return $bestMenus;
    }

    public function storeRiwayat(Request $request)
    {
        $data = $request->input('data'); // Mengambil data dari request

        foreach ($data as $menu) {
            if (isset($menu['id']) && is_numeric($menu['id'])) {
                Riwayat::create([
                    'id_menu' => $menu['id']
                ]);
            }
        }

        // Redirect ke halaman riwayat setelah data disimpan
        return redirect()->route('riwayat.index');
    }

    public function riwayat($data, $id_pengguna, $budget, $kecamatan)
    {
        $riwayat = [];
        // dd($data);
        foreach($data as $menu){
            $riwayat = Riwayat::create([
                'id_pengguna' => $id_pengguna,
                'id_menu' => $menu['id'],
                'budget' => $budget,
                'kecamatan' => $kecamatan
            ]);
        }

        return $riwayat;
    }
    


    
    
    

}

