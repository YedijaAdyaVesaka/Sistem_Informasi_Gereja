<title>Pendeta | GKJW RINGIN PITU</title>

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
    <h2>Data Pendeta</h2>
</center>
    {{-- Table Pendeta --}}
    <table border="1"class="table table-bordered datatable ">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No.Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendeta as $p)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->no_telp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
