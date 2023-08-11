@extends('layouts.appCustom')

@section('content')
    <header>
        <img src="{{ public_path('assets/images/banner_top_itc.jpg') }}" alt="banner" width="1024">
    </header>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @switch($tipo)
                    @case(1)
                        <h1>Reporte de Equipos Registrados</h1>
                    @break;
                    @case(2)
                        @foreach ($marca as $mark)
                            <h1>Reporte de Equipos Registrados pertenecientes a la Marca: {{ $mark->descripcion }}</h1>
                        @endforeach
                    @break;
                @endswitch
                <h3>Fecha de generacion del Reporte: {{ $date }}</h3>
            </div>
            @if ($equipos->count())
                <div class="card-body">
                    <table class="content-table table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Numero de Serie</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Estado del Equipo</th>
                                <th scope="col">Marca del Equipo</th>
                                <th scope="col">Categoria del Equipo</th>
                                <th scope="col">Laboratorio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $equipo)
                                <tr>
                                    <td>{{ $equipo->No_Serie }}</td>
                                    <td>{{ $equipo->descripcion }}</td>
                                    <td>{{ $equipo->estatus }}</td>
                                    <td>{{ $equipo->marca }}</td>
                                    <td>{{ $equipo->tipoEquipo }}</td>
                                    <td>{{ $equipo->laboratorio }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            @else
                <div class="card-body">
                    <strong>
                        No hay registros
                    </strong>
                </div>
            @endif
        </div>
    @endsection
