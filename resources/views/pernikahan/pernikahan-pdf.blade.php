<title>Pernikahan | GKJW RINGIN PITU</title>
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
    <h2>Data Pernikahan GKJW RINGIN PITU</h2>
</center>
    {{-- Table Pernikahan --}}
    <table border="1"class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Pendeta</th>
                <th>Nama Jemaat Pria</th>
                <th>Nama Jemaat Wanita</th>
                <th>Tanggal Pernikahan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pernikahan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->pendeta->nama }}</td>
                <td>{{ $p->jemaat_pria->nama }}</td>
                <td>{{ $p->jemaat_wanita->nama }}</td>
                <td>{{ $p->tanggal_pernikahan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>