@extends('layouts.master')

<title>Pendeta | GKJW RINGIN PITU</title>

@section('content')
    <div class="pagetitle">
        <h1>Pendeta</h1>
    </div>
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Pendeta</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('pendeta.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id_pendeta" value="{{ $pendeta->id }}">
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama <span>*</span></label>
                    <input type="text" class="form-control input" name="nama" value="{{ $pendeta->nama }}" id="nama"
                        placeholder="Masukan nama anda">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control input" id="alamat" name="alamat" rows="5" placeholder="Masukkan alamat anda">{{ $pendeta->alamat }}</textarea>
                </div>

                <div class="mb-4 d-flex flex-column gap-3">
                    <label for="">Jenis Kelamin</label>
                    <div class="input-radio"> 
                        <input class="form-check-input input custom-checked" value="l" type="radio" name="jk" id="man" @if ($pendeta->jenis_kelamin == 'L')
                            @checked(true)
                        @endif>
                        <label class="form-check-label" for="man">
                            Laki - Laki
                        </label>
                    </div>
                    <div class="input-radio">
                        <input class="form-check-input input custom-checked" value="p" type="radio" name="jk" id="man" @if ($pendeta->jenis_kelamin == 'P')
                        @checked(true)
                    @endif >
                        <label class="form-check-label" for="man">
                            Perempuan
                        </label> 
                    </div>
                </div>

                <div class="mb-4">
                    <label for="no" class="form-label">No.Telp</label>
                    <input type="text" class="form-control input" name="telp" id="no" value="{{ $pendeta->no_telp }}"
                        placeholder="Masukan nomor telepon anda">
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('pendeta') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
                {{-- <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button> --}}
            </form>
        </div>
    </div>
@endsection
