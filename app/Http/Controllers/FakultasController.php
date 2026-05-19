<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //akses model fakultas untuk mengambil semua data fakultas
        $result = Fakultas::all(); // select * from fakultas
        // //dd($result); // dump data hasil query ke browser
        // kirim data fakultas ke view index
        // return view ('fakultas.index')->with('fakultas', $result);
        // atau compact
        return view ('fakultas.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Falidasi data
        $input = $request->validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required',
            'dekan' => 'required'
        ]);

        //simpan data ke tabel fakultas
        Fakultas::create($input);

        //redirect ke halaman index fakultas
        return redirect()->route('fakultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fakultas)
    {
        $fakultas = Fakultas::find($fakultas);
        // dd($fakultas);
        return view('fakultas.edit', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fakultas)
    {
        //
        $fakultas = Fakultas::find($fakultas);
        // dd($fakultas);
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Data fakultas berhasil dihapus');// redirect ke halaman index fakultas
    }
}
