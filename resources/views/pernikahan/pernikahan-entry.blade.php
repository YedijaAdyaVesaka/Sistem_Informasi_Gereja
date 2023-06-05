@extends('layouts.master')

<title>Pernikahan | GKJW RINGIN PITU</title>

@section('content')
    <div class="pagetitle">
        <h1>Pendeta</h1>
    </div>
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Pernikahan</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('pernikahan.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="pendeta" class="form-label">Pendeta</label>
                    <select class="form-control input" id="pendeta" name="pendeta">
                        <option value="" disabled selected id="defautlSelect">Pilih Pendeta</option>
                        @foreach ($pendeta as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="jemaat" class="form-label">Nama Jemaat Pria</label>
                    <select class="form-control input" id="jemaat" name="jemaat_pria">
                        <option value="" disabled selected id="defautlSelect">Pilih Jemaat</option>
                        @foreach ($jemaat as $j)
                            <option value="{{ $j->id }}">{{ $j->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="jemaat" class="form-label">Nama Jemaat Wanita</label>
                    <select class="form-control input" id="jemaat" name="jemaat_wanita">
                        <option value="" disabled selected id="defautlSelect">Pilih Jemaat</option>
                        @foreach ($jemaat as $j)
                            <option value="{{ $j->id }}">{{ $j->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="form-label">Tanggal Pernikahan</label>
                    <input type="date" class="form-control input" name="tanggal" id="tanggal">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('pernikahan') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
