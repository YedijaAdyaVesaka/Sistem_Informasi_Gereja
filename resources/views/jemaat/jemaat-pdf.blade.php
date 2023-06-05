<title>Data Jemaat GKJW RINGIN PITU</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table th {
        padding: 10px;
    }

    table td {
        padding: 5px;
    }

</style>
<center>
    <h2>Data Jemaat</h2>
</center>

{{-- Tabel Jemaat --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telp</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Golongan Jemaat</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($jemaat as $j)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $j->nama }}</td>
                <td>{{ $j->alamat }}</td>
                <td>{{ $j->jenis_kelamin }}</td>
                <td>{{ $j->no_telp }}</td>
                <td>{{ $j->nama_ayah }}</td>
                <td>{{ $j->nama_ibu }}</td>
                <td>{{ $j->golongan_jemaat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
