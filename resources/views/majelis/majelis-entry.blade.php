@extends('layouts.master')

<title>Majelis | GKJW RINGIN PITU</title>

@section('content')
    <div class="pagetitle">
        <h1>Majelis</h1>
    </div>
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Majelis</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('majelis.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama <span>*</span></label>
                    <input type="text" class="form-control input" name="nama" id="nama" placeholder="Masukan nama anda">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control input" name="alamat" id="alamat" rows="5" placeholder="Masukkan alamat anda"></textarea>
                </div>
                <div class="mb-4 d-flex flex-column gap-3">
                    <label for="">Jenis Kelamin</label>
                    <div class="input-radio">
                        <input class="form-check-input input custom-checked" value="l" type="radio" name="jk" id="man">
                        <label class="form-check-label" for="man">
                            Laki - Laki
                        </label>
                    </div>
                    <div class="input-radio">
                        <input class="form-check-input input custom-checked" value="p" type="radio" name="jk" id="man">
                        <label class="form-check-label" for="man">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="no" class="form-label">No.Telp</label>
                    <input type="text" class="form-control input" name="telp" id="no"
                        placeholder="Masukan nomor telepon anda">
                </div>
                <div class="mb-4">
                    <label for="ayah" class="form-label">Nama Ayah<span>*</span></label>
                    <input type="text" class="form-control input" name="ayah" id="ayah" placeholder="Masukan nama ayah anda">
                </div>
                <div class="mb-4">
                    <label for="ibu" class="form-label">Nama Ibu<span>*</span></label>
                    <input type="text" class="form-control input" name="ibu" id="ibu" placeholder="Masukan nama ibu anda">
                </div>
                
                <div class="mb-4">
                    <label for="username" class="form-label">Username<span>*</span></label>
                    <input type="text" class="form-control input" id="username" name="username" placeholder="Masukan nama username anda">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email<span>*</span></label>
                    <input type="text" class="form-control input" id="email" name="email" placeholder="Masukan nama username anda">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password<span>*</span></label>
                    <input type="text" class="form-control input" id="password" name="password" placeholder="Masukan nama username anda">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('majelis') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
                {{-- <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button> --}}
            </form>
        </div>
    </div>
    </div>
@endsection
