@extends('layouts.master')

<title>Pendeta | GKJW RINGIN PITU</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


@section('content')
    <div class="pagetitle">
        <h1>Data Pendeta</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah Data --}}
    <div>
        <a href="{{ route('pendeta-entry') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
        <a href="pendeta-pdf" class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak
            Data</a>
    </div>
   
    {{-- Table Majelis --}}
    <table class="table table-bordered datatable ">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No.Telp</th>
                <th>Action</th>
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
                <td class="d-flex align-items-center justify-content-center gap-2">
                    <a href="{{ route('pendeta.edit', $p->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                class="bi bi-pencil-square me-1"></i>Edit</a>
                    <a href="{{ route('pendeta.destroy', $p->id) }}" title="Hapus"><button class="btn btn-danger btn-sm"><i
                                class="bi bi-trash2-fill"></i>Hapus</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
