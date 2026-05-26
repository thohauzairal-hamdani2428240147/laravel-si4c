<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data mahasiswa berelasi prodi
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi input data
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm', //npm harus unik di tabel mahasiswas
            'nama' => 'required',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'email' => 'nullable|email|unique:mahasiswas,email',
            'foto' => 'nullable|image|max:2048', // maksimal 2MB
            'prodi_id' => 'required|exists:prodis,id', // pastikan prodi_id ada di tabel prodis
        ]);
        //upload file foto jika ada
        if ($request->hasFile('foto')) {
            //rename file dengan npm untuk menghindari duplikasi nama file
            $filename = $input['npm'] . '_' . $request->file('foto')->getClientOriginalExtension();
            // simpan file ke folder public/storage/mahasiswa_foto
            $input['foto'] = $request->file('foto')->storeAs('mahasiswa_foto', $filename, 'public');
        } else {
            $input['foto'] = null; //set foto null jika tidak ada file yang diupload
        }
        //simpan data mahasiswa ke database
        Mahasiswa::create($input);
        //redirect ke halaman index mahasiswa dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $edit = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'nama' => 'required',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'email' => 'nullable|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'foto' => 'nullable|image',
            'prodi_id' => 'required|exists:prodis,id',
        ]);
        if ($request->hasFile('foto')) {
            //rename file dengan npm untuk menghindari duplikasi nama file
            $filename = $edit['npm'] . '_' . $request->file('foto')->getClientOriginalExtension();
            // simpan file ke folder public/storage/mahasiswa_foto
            $edit['foto'] = $request->file('foto')->storeAs('mahasiswa_foto', $filename, 'public');
        } else {
            $edit['foto'] = null; //jika tidak ada file baru, gunakan foto lama
        }
        $mahasiswa->update($edit);
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');

        //hapus file foto jika ada
        if ($mahasiswa->foto && file_exists(public_path('storage/' . $mahasiswa->foto))) {
            unlink(public_path('storage/' . $mahasiswa->foto)); //hapus file foto dari folder storage
        }
    }
}
