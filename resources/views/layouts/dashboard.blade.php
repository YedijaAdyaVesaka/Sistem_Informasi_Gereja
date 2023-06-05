@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col">
                <div class="row">

                    <!-- Jemaat Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Jemaat</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$jemaat}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Jemaat Card -->

                    <!-- Majelis Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Majelis</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$majelis}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Majelis Card -->

                    <!-- Pernikahan Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Pernikahan </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$pernikahan}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Data Pernikahan Card -->

                    <!-- Baptis Card -->
                    <div class="col-xxl-3 col-md-6">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Data Baptis</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder2-open"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$baptis}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- End Baptis Card -->
                </div>
            </div>
    </section>
@endsection
