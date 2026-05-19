@extends('main')

@section('title', 'Tambah Periode')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Periode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('periode.store') }}" method="post">
        @csrf
        <div class="m-3">
            <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
            <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" value="{{ old ( 'tahun_akademik' ) }}" >
            @error('tahun_akademik')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="kode_smt" class="form-label">Kode Semester</label>
            <input type="text" class="form-control" id="kode_smt" name="kode_smt" placeholder="Masukkan Kode Semester 1 Atau 2 Maksimal 1 angka" value="{{ old ( 'kode_smt' ) }}" maxlength="1">
            @error('kode_smt')
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