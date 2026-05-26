<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // db
        $jumlahmahasiswa = DB::select('SELECT COUNT(*) AS 
        jumlah FROM mahasiswas m 
        join prodis p 
        on m.prodi_id = p.id
        group by p.nama_prodi');
        return view('dashboard.index', compact('jumlahmahasiswa'));
    }
}
