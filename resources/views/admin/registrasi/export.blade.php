<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Jenjang</th>
        <th>Kelas</th>
        <th>Asal Sekolah</th>
        <th>Jenis Paket</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($registrasi as $r)
        <tr>
            <td>{{ $r->name }}</td>
            <td>{{ $r->email }}</td>
            <td>{{ $r->alamat }}</td>
            <td>{{ $r->jenjang }}</td>
            <td>{{ $r->kelas }}</td>
            <td>{{ $r->asal_sekolah }}</td>
            <td>{{ $r->jenis_paket }}</td>
            <td>
                @if ($r->status == 0)
                    Belum Dikonfirmasi

                    @else
                    Telah Dikonfirmasi
                @endif    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>