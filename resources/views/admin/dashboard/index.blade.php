@extends('admin.layouts.main')

@section('content')
    <div class="page-title">
        <h3>Dashboard Pegawai</h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-6">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Admin</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ $admin }}</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Pegawai</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ $pegawai }}</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
