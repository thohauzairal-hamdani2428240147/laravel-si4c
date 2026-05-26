@extends('main')

@section('title', 'Data Mahasiswa')

@section('content')
<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $key => $mhs)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $mhs->npm }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->prodi->nama_prodi ?? '-' }}</td>
            <td>
                @if ($mhs->foto)
                <img src="{{ asset('storage/' . $mhs->foto) }}" alt="Foto" style="width: 100px">
                @else
                <span class="text-muted">Tidak ada foto</span>
                @endif
            </td>
            <td>
                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-xs btn-info btn-rounded">Edit</a>
                <form method="POST" action="{{ route('mahasiswa.destroy', $mhs->id) }}" class="d-inline">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                        data-toggle="tooltip" title='Delete'
                        data-nama='{{ $mhs->nama }}'>Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection