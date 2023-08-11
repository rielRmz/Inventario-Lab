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
                            <h1>Reporte de Equipos Instalados en el: {{ $mark->laboratorio }}</h1>
                        @endforeach
                    @break;
                @endswitch
                <h3>Fecha de generacion del Reporte: {{ $date }}</h3>
            </div>
            @if ($labs->count())
                <div class="card-body">
                    <table class="content-table table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No Serie</th>
                                <th scope="col">Equipo</th>
                                <th scope="col">Identificador</th>
                                <th scope="col">Sistema Operativo</th>
                                <th scope="col">Procesador</th>
                                <th scope="col">Monitor</th>
                                <th scope="col">Memoria RAM</th>
                                <th scope="col">Almacenamiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($labs as $lab)
                                <tr>
                                    <td>{{ $lab->No_Serie }}</td>
                                    <td>{{ $lab->descripcion }}</td>
                                    <td>{{ $lab->equipoLab_id }}</td>
                                    <td>{{ $lab->SO }}</td>
                                    <td>{{ $lab->proc }}</td>
                                    <td>{{ $lab->Ram }}</td>
                                    <td>{{ $lab->Monitor }}</td>
                                    <td>{{ $lab->Almacenamiento }}</td>
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
    </div>
@endsection
