@extends('main')

@section('title', 'Tambah Fakultas')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('fakultas.store') }}" method="post">
        @csrf
        <div class="m-3">
            <label for="nama" class="form-label">Nama Fakultas</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Fakultas" value="{{ old ( 'nama' ) }}" >
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="singkatan" class="form-label">Singkatan Fakultas</label>
            <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="Masukkan Singkatan Fakultas"value="{{ old ( 'singkatan' ) }}" >
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="dekan" class="form-label">Nama Dekan Fakultas</label>
            <input type="text" class="form-control" id="dekan" name="dekan" placeholder="Masukkan Nama Dekan Fakultas" value="{{ old ( 'dekan' ) }}" >
            @error('dekan')
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