@extends('layouts.master')

<title>Jadwal | GKJW RINGIN PITU</title>

@section('content')
    <div class="pagetitle">
        <h1>Jadwal Ibadah</h1>
    </div>
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Jadwal Ibadah</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('jadwal.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
                <div class="mb-4">
                    <label for="pendeta" class="form-label">Pendeta</label>
                    <select class="form-control input" id="pendeta" name="pendeta">
                        <option value="" disabled selected id="defautlSelect">Pilih Pendeta</option>
                    @foreach($pendeta as $p)
                    <option value="{{$p->id}}"{{ $jadwal->id_pendeta == $p->id ? "Selected" : '' }}>{{$p->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="majelis" class="form-label">Majelis</label>
                    <select class="form-control input" id="majelis" name="majelis">
                    <option value="" disabled selected id="defautlSelect">Pilih Majelis</option>
                    @foreach($majelis as $m)
                    <option value="{{$m->id}}"{{ $jadwal->id_majelis == $m->id ? "Selected" : '' }}>{{$m->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control input" name="nama" value="{{ $jadwal->nama }}" id="nama" placeholder="Masukan nama ibadah">
                </div>
                <div class="mb-4">
                    <label for="tempat" class="form-label">Tempat</label>
                    <textarea class="form-control input" name="tempat" id="tempat" rows="5" placeholder="Masukkan nama tempat">{{ $jadwal->tempat }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="datetime-local" class="form-control input" name="tanggal" value="{{ $jadwal->tanggal }}" id="Tanggal"
                        placeholder="Masukan Tanggal Ibadah">
                </div>
                <div class="mb-4">
                    <label for="bacaan" class="form-label">Bacaan<span>*</span></label>
                    <input type="text" class="form-control input" name ="bacaan" value="{{ $jadwal->bacaan }}" id="bacaan" placeholder="Masukan Bacaan Renungan">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('jadwal') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
