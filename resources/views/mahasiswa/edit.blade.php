@extends('main')

@section('title', 'Edit Mahasiswa')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="m-3">
            <label for="npm" class="form-label">NPM Mahasiswa</label>
            <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM Mahasiswa" value="{{ old ( 'npm', $mahasiswa->npm ) }}" >
            @error('npm')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" value="{{ old ( 'nama', $mahasiswa->nama ) }}" >
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="prodi_id" class="form-label">Program Studi</label>
            <select name="prodi_id" id="prodi_id" class="form-select">
                <option value="">Pilih Prodi</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->nama_prodi }}
                    </option>
                @endforeach
            </select>
            @error('prodi_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" value="{{ old ( 'foto', $mahasiswa->foto ) }}" >
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>

@endsection