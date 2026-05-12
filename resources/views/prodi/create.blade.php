@extends('main')

@section('title', 'Tambah Prodi')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Pengisian Data Prodi</h3>
            </div>
            <form action="{{ route('prodi.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Nama Prodi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Prodi" required>
                    </div>

                    <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan Prodi</label>
                        <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="Masukkan Singkatan (maks 2 karakter)" maxlength="2" required>
                    </div>

                    <div class="mb-3">
                        <label for="kaprodi" class="form-label">Nama Kaprodi</label>
                        <input type="text" class="form-control" id="kaprodi" name="kaprodi" placeholder="Masukkan Nama Kaprodi" required>
                    </div>

                    <div class="mb-3">
                        <label for="fakultas_id" class="form-label">Fakultas</label>
                        <select class="form-select" id="fakultas_id" name="fakultas_id" required>
                            <option value="">-- Pilih Fakultas --</option>
                            @foreach($fakultas as $f)
                                <option value="{{ $f->id }}">{{ $f->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
