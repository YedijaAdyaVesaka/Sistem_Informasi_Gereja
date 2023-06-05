@extends('layouts.master')

<title>Kebaktian | GKJW RINGIN PITU</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


@section('content')
    <div class="pagetitle">
        <h1>Data Kebaktian</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- button Tambah Data --}}
    <div>
        <a href="{{ route('kebaktian.show') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
        <a href="kebaktian-pdf" class="btn btn-success active md-5 mb-3"><i
                class="bi bi-printer me-1"></i>Cetak Data</a>
    </div>
    {{-- <button class="btn-add mb-4 border-0 px-3 py-2 text-white rounded-3 fw-medium d-flex align-items-center gap-2"
        onclick="location.href='{{ route('kebaktian-entry') }}'">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="white"
                d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2z" />
        </svg>
        Add Data
    </button> --}}
    {{-- Table Kebaktian --}}
    <table class="table datatable table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Pendeta</th>
                <th>Nama Majelis</th>
                <th>Nama</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Action</th>
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
                <td class="d-flex align-items-center justify-content-center gap-2">
                    <a href="{{ route('kebaktian.edit', $k->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                class="bi bi-pencil-square me-1"></i>Edit</a>
                    <a href="{{ route('kebaktian.destroy', $k->id) }}" title="Hapus"><button class="btn btn-danger btn-sm"><i
                                class="bi bi-trash2-fill"></i>Hapus</button></a>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6q-.425 0-.713-.288T4 5q0-.425.288-.713T5 4h4q0-.425.288-.713T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.588 1.413T17 21H7ZM7 6v13h10V6H7Zm2 10q0 .425.288.713T10 17q.425 0 .713-.288T11 16V9q0-.425-.288-.713T10 8q-.425 0-.713.288T9 9v7Zm4 0q0 .425.288.713T14 17q.425 0 .713-.288T15 16V9q0-.425-.288-.713T14 8q-.425 0-.713.288T13 9v7ZM7 6v13V6Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 15 15"><path fill="currentColor" fill-rule="evenodd" d="M11.854 1.146a.5.5 0 0 0-.707 0L3.714 8.578a1 1 0 0 0-.212.314L2.04 12.303a.5.5 0 0 0 .657.657l3.411-1.463a1 1 0 0 0 .314-.211l7.432-7.432a.5.5 0 0 0 0-.708l-2-2Zm-7.432 8.14l7.078-7.08L12.793 3.5l-7.078 7.078l-1.496.641l-.438-.438l.64-1.496Z" clip-rule="evenodd"/></svg> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
