<title>Majelis | GKJW RINGIN PITU</title>
<style>
    table {
        border-collapse: collapse;
    }

    table th {
        padding: 10px;
    }

    table td {
        padding: 5px;
    }

</style>
<center>
    <h2>Data Majelis</h2>
</center>
    {{-- Table Majelis --}}
    <table border="1"class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>No.Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($majelis as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->nama }}</td> 
                <td>{{ $m->alamat }}</td>
                <td>{{ $m->jenis_kelamin }}</td>
                <td>{{ $m->no_telp }}</td>
                <td>{{ $m->nama_ayah }}</td>
                <td>{{ $m->nama_ibu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
