
<title>Pelayan | GKJW RINGIN PITU</title>
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
    <h2>Data Pelayan</h2>
</center>
    {{-- Table Pelayan --}}
    <table border="1" class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Jadwal</th>
                <th>Nama Majelis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelayan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->jadwal->nama }}</td>
                <td>{{ $p->majelis->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
