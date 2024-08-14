<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlgoritmaGenetikaController extends Controller
{
    public function recommendationform()
    {
        return view('recommendation_form');
    }

    public function recommend(Request $request)
    {
        $budget = escapeshellarg($request->input('budget'));
        $district = escapeshellarg($request->input('kecamatan'));

        // Path ke skrip Python, menggunakan base_path untuk memastikan path yang benar
        $pythonScript = base_path('/scripts/algoritmagenetika.py');

        // Mempersiapkan command untuk menjalankan skrip Python
        $command = "python $pythonScript $budget $district";
        
        // Menjalankan command dan menangkap output
        $output = shell_exec($command);

        // Logging untuk debugging (opsional)
        Log::info("Python Output: " . $output);

        // Memproses output dari skrip Python
        $recommendations = json_decode($output, true);

        // Periksa apakah decoding JSON berhasil
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors('Terjadi kesalahan saat memproses rekomendasi.');
        }

        return view('recommend', ['recommend' => $recommendations]);
    }
}
