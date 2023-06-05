<title>Data Renungan</title>
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
    <h2>Renungan GKJW RINGIN PITU</h2>
</center>

    {{-- Table Majelis --}}
    <table border="1" class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Bacaan</th>
                <th>Isi Renungan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($renungan as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->judul }}</td>
                    <td>{{ $r->bacaan }}</td>
                    <td>{{ $r->isi_renungan }}</td>
                    <td>{{ $r->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
