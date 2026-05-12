@extends('main')

@section('title', 'Program Studi')
    
@section('content')
<a href="{{ route('prodi.create') }}" class="btn btn-primary mb-3">Tambah Prodi</a>

<h1>Data Prodi</h1>

<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Singkatan</th>
        <th>Kaprodi</th>
        <th>Fakultas</th>
    </tr>

    @foreach($result as $key => $item)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->nama_prodi }}</td>
        <td>{{ $item->singkatan }}</td>
        <td>{{ $item->kaprodi }}</td>
        <td>{{ $item->fakultas->nama ?? '-' }}</td>
    </tr>
    @endforeach

</table>
@endsection