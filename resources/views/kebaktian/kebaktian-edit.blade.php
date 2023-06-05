@extends('layouts.master')

<title>Kebaktian | GKJW RINGIN PITU</title>

@section('content')
    <div class="pagetitle">
        <h1>Kebaktian</h1>
    </div>
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Kebaktian</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{route('kebaktian.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id_kebaktian" value="{{ $kebaktian->id }}">
                <div class="mb-4">
                    <label for="pendeta" class="form-label">Pendeta</label>
                    <select class="form-control input" id="pendeta" name="pendeta">
                        <option value="" disabled selected id="defautlSelect">Pilih Pendeta</option>
                    @foreach($pendeta as $p)
                    <option value="{{$p->id}}"{{ $kebaktian->id_pendeta == $p->id ? "Selected" : '' }}>{{$p->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="majelis" class="form-label">Majelis</label>
                    <select class="form-control input" id="majelis" name="majelis">
                    <option value="" disabled selected id="defautlSelect">Pilih Majelis</option>
                    @foreach($majelis as $m)
                    <option value="{{$m->id}}"{{ $kebaktian->id_majelis == $m->id ? "Selected" : '' }}>{{$m->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama <span>*</span></label>
                    <input type="text" class="form-control input" name="nama" value="{{ $kebaktian->nama }}" id="nama" placeholder="Masukan nama kebaktian">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Tempat</label>
                    <textarea class="form-control input" name="tempat" id="tempat" rows="5" placeholder="Masukkan alamat anda">{{ $kebaktian->tempat }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control input" name="tanggal" value="{{ $kebaktian->tanggal }}" id="Tanggal">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('kebaktian') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
