@extends('layouts.master')

<title>Jadwal | GKJW RINGIN PITU</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


@section('content')
    <div class="pagetitle">
        <h1>Jadwal Ibadah</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- button Tambah Data--}}
    <div>
        <a href="{{ route('jadwal.show') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah Data</a> 
        <a href="jadwal-pdf" class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak Data</a>
    </div>
     
    {{-- Table Jadwal --}}
    <table class="table datatable table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Pendeta</th>
                <th>Nama Majelis</th>
                <th>Nama</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Bacaan</th>
                <th>Action</th>
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
                <td class="d-flex align-items-center justify-content-center gap-2">
                    <a href="{{ route('jadwal.edit', $j->id) }}"><button class="btn btn-info btn-sm me-1"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                    <a href="{{ route('jadwal.destroy', $j->id) }}" title="Hapus"><button class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
