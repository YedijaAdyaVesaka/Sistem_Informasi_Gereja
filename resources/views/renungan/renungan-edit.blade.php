@extends('layouts.master')

<title>Renungan | GKJW RINGIN PITU</title>

@section('content')
    <div class="pagetitle">
        <h1>Renungan</h1>
    </div>
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data </h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('renungan.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id_renungan" value="{{ $renungan->id }}">
                <div class="mb-4">
                    <label for="judul" class="form-label">Judul <span>*</span></label>
                    <input type="text" class="form-control input" name ="judul" value="{{ $renungan->judul }}" id="judul" placeholder="Masukan Judul Renungan">
                </div>
                <div class="mb-4">
                    <label for="pendeta" class="form-label">Pendeta</label>
                    <select class="form-control input" id="pendeta" name="pendeta">
                        <option value="" disabled selected id="defautlSelect">Pilih Pendeta</option>
                    @foreach($pendeta as $p)
                    <option value="{{$p->id}}"{{ $renungan->id_pendeta == $p->id ? "Selected" : '' }}>{{$p->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="bacaan" class="form-label">Bacaan<span>*</span></label>
                    <input type="text" class="form-control input" name ="bacaan" value="{{ $renungan->bacaan }}" id="bacaan" placeholder="Masukan Bacaan Renungan">
                </div>
                <div class="mb-4">
                    <label for="isi" class="form-label">Isi Renungan</label>
                    <textarea class="form-control input" name="isi" id="isi" rows="5" placeholder="Masukkan Isi Renungan">{{ $renungan->isi }}</textarea>
                </div>
                <div class="mb-4">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control input" name="tanggal" value="{{ $renungan->tanggal }}" id="Tanggal">
                </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" onclick="history.back()" href="{{ route('renungan') }}" class="btn btn-secondary">Kembali</button>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button> --}}
            </form>
        </div>
    </div>
    </div>
@endsection
