<?php

namespace App\Http\Controllers;

use App\Models\periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //akses model periode
        $result = periode::all(); // select * from periode
        //dd($result);// dump data hasil query ke browser
        // kirim data periode ke view index
        // return view ('periode.index')->with('periode', $result);
        // atau compact
        return view ('periode.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(periode $periode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, periode $periode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(periode $periode)
    {
        //
    }
}
