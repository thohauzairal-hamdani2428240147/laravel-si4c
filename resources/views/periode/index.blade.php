@extends('main')

@section('title', 'Periode')

@section('content')
<a href="{{ route('periode.create') }}" class="btn btn-primary mb-3">Tambah Peri    ode</a>

<h1>data Periode</h1>

<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Tahun Akademik</th>
        <th>Kode Semester</th>
    </tr>
    @foreach ($result as $key => $item)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->tahun_akademik }}</td>
        <td>{{ $item->kode_smt }}</td>
    </tr>
    @endforeach
</table>
@endsection