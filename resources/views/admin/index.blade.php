@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total de Equipos por Marca</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>

                                <canvas id="myBarChart1" width="100" href="100"></canvas>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Goal Completion</strong>
                            </p>
                            @foreach($Equipos as $Equipo)
                                <div class="progress-group">
                                    {{ $Equipo->Marcas }}
                                    <span class="float-right">{{ $Equipo->cantidades }}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total de Equipos instalados por laboratorio</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>

                                <canvas id="myBarChart2" width="100" href="100"></canvas>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Goal Completion</strong>
                            </p>
                            @foreach($Labs as $Lab)
                                <div class="progress-group">
                                    {{ $Lab->laboratorio }}
                                    <span class="float-right">{{ $Lab->cantidades }}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        var Data1 = @json($equipo);
        var Data2 = @json($labs);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/sample-charts.js') }}"></script>
@endsection
