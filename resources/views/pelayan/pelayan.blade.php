@extends('layouts.master')

<title>Pelayan | GKJW RINGIN PITU</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


@section('content')
    <div class="pagetitle">
        <h1>Data Pelayan</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- button Tambah Data--}}
    <div>
        <a href="{{ route('pelayan.show') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah Data</a> 
        <a href="pelayan-pdf" class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak Data</a>
    </div>
    
    {{-- Table Pelayan --}}
    <table class="table datatable table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Jadwal</th>
                <th>Nama Majelis</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelayan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->jadwal->nama }}</td>
                <td>{{ $p->majelis->nama }}</td>
                <td class="d-flex align-items-center justify-content-center gap-2">
                    <a href="{{ route('pelayan.edit', $p->id) }}"><button class="btn btn-info btn-sm me-1"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                    <a href="{{ route('pelayan.destroy', $p->id) }}" title="Hapus"><button class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
