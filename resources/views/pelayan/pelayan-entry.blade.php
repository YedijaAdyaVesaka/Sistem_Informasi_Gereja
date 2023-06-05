@extends('layouts.master')

<title>Pelayan | GKJW RINGIN PITU</title>

@section('content')
    <div class="pagetitle">
        <h1>Pelayan</h1>
    </div>
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Pelayan</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{route('pelayan.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="jadwal" class="form-label">Jadwal</label>
                    <select class="form-control input" id="jadwal" name="jadwal">
                        <option value="" disabled selected id="defautlSelect">Pilih Jadwal</option>
                    @foreach($jadwal as $j)
                    <option value="{{$j->id}}">{{$j->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="majelis" class="form-label">Jemaat</label>
                    <select class="form-control input" id="majelis" name="majelis">
                    <option value="" disabled selected id="defautlSelect">Pilih Majelis</option>
                    @foreach($majelis as $m)
                    <option value="{{$m->id}}">{{$m->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('pelayan') }}" class="btn btn-secondary">Kembali</button>
                </div>
                {{-- <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button> --}}
            </form>
        </div>
    </div>
@endsection
