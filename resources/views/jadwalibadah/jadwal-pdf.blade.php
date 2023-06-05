<title>Jadwal | GKJW RINGIN PITU</title>
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
    <h2>JADWAL IBADAH GKJW RINGIN PITU</h2>
</center>



{{-- Table Jadwal --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Pendeta</th>
            <th>Nama Majelis</th>
            <th>Nama</th>
            <th>Tempat</th>
            <th>Tanggal</th>
            <th>Bacaan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwal as $j)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $j->pendeta->nama }}</td>
                <td>{{ $j->majelis->nama }}</td>
                <td>{{ $j->nama }}</td>
                <td>{{ $j->tempat }}</td>
                <td>{{ $j->tanggal }}</td>
                <td>{{ $j->bacaan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
