<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboarController extends Controller
{
    public function index()
    {
        // Grafik 1 - per Program Studi
        $grafikmhs = DB::select("SELECT prodis.nama_prodi, 
                                COUNT(*) as jumlah_mhs 
                                FROM mahasiswas
                                JOIN prodis 
                                ON mahasiswas.prodi_id = prodis.id
                                GROUP BY prodis.nama_prodi");

        // Grafik 2 - per Tahun Angkatan
        $grafik_angkatan = DB::select("SELECT LEFT(npm, 2) as tahun_angkatan, 
                                COUNT(*) as jumlah_mhs 
                                FROM mahasiswas
                                GROUP BY LEFT(npm, 2)");

        return view('Dashboard', compact('grafikmhs', 'grafik_angkatan'));
    }
}