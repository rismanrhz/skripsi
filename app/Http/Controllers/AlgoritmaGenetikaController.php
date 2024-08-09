<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgoritmaGenetikaController extends Controller
{
    public function runAlgorithm(Request $request)
    {
        // Encode parameters ke format JSON
        $parameters = json_encode($request->all());
        
        // Jalankan skrip Python dan tangkap output-nya
        $command = escapeshellcmd("python3 " . base_path('scripts/AlgoritmaGenetika.py') . " '" . escapeshellarg($parameters) . "'");
        $output = shell_exec($command);
        
        // Decode output dari Python
        $result = json_decode($output, true);
        
        return response()->json($result);
    }
}
