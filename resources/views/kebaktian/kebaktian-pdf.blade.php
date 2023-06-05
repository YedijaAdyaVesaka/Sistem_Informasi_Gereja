<title>Kebaktian | GKJW RINGIN PITU</title>
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
    <h2>JADWAL KEBAKTIAN GKJW RINGIN PITU</h2>
</center>



    {{-- Table Kebaktian --}}
    <table border="1" class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Pendeta</th>
                <th>Nama Majelis</th>
                <th>Nama</th>
                <th>Tempat</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($kebaktian as $k)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->pendeta->nama }}</td>
                <td>{{ $k->majelis->nama }}</td>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->tempat }}</td>
                <td>{{ $k->tanggal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

