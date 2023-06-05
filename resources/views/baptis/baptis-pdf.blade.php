<title> Data Baptis GKJW RINGIN PITU</title>
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
    <h2>Data Jemaat</h2>
</center>

    {{-- Table Baptis --}}
    <table border="1" class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Pendeta</th>
                <th>Nama Jemaat</th>
                <th>Tanggal Baptis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($baptis as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->pendeta->nama }}</td>
                    <td>{{ $b->jemaat->nama }}</td>
                    <td>{{ $b->tanggal_baptis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

