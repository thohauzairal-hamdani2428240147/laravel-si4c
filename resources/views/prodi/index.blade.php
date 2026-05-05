<h2>Data Prodi</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Prodi</th>
            <th>Singkatan</th>
            <th>Kaprodi</th>
            <th>Fakultas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $item)
            <tr>
                <td>{{ $item->nama_prodi }}</td>
                <td>{{ $item->singkatan }}</td>
                <td>{{ $item->kaprodi }}</td>
                <td>{{ $item->fakultas->nama ?? 'Tidak Ada' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
