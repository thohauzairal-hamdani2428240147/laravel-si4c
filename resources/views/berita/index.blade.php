<h1>Data Berita</h1>
@foreach ($result as $item)
    <h2>{{ $item->judul }}</h2>
    <p>{{ $item->deskripsi }}</p>
@endforeach