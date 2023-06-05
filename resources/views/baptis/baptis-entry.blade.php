@extends('layouts.master')

<title>Baptis | GKJW RINGIN PITU</title>

@section('content')
    <div class="pagetitle">
        <h1>Baptis</h1>
    </div>
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Baptis</h4>
        
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{route('baptis.store')}}" method="POST">
                @csrf
                    <div class="mb-4">
                        <label for="pendeta" class="form-label">Pendeta</label>
                        <select class="form-control input" id="pendeta" name="pendeta">
                            <option value="" disabled selected id="defautlSelect">Pilih Pendeta</option>
                        @foreach($pendeta as $p)
                        <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="jemaat" class="form-label">Jemaat</label>
                        <select class="form-control input" id="jemaat" name="jemaat">
                        <option value="" disabled selected id="defautlSelect">Pilih Jemaat</option>
                        @foreach($jemaat as $j)
                        <option value="{{$j->id}}">{{$j->nama}}</option>
                        @endforeach
                        </select>
                    </div>

                <div class="mb-4">
                    <label for="tanggal" class="form-label">Tanggal Baptis</label>
                    <input type="date" class="form-control input" name="tanggal" id="Tanggal">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('baptis') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
