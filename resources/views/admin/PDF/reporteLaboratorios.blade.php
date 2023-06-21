@extends('layouts.appCustom')

@section('content')
    <div class="card">
        <div class="card-header">
            <img src="{{ public_path('images/banner_top_itc.jpg') }}" alt="banner">
        </div>
        @if($labs->count())
            <div class="card-body">
                <table class="content-table table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Identificador</th>
                        <th scope="col">Sistema Operativo</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Marca del Equipo</th>
                        <th scope="col">Procesador</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Monitor</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Memoria RAM</th>
                        <th scope="col">Marca</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($labs as $lab)
                        <tr>
                            <td>{{ $lab->equipoLab_id }}</td>
                            <td>{{ $lab->SO }}</td>
                            <td>{{ $lab->descripcion }}</td>
                            <td>{{ $lab->marca }}</td>
                            <td>{{ $lab->proc }}</td>
                            <td>{{ $lab->procM }}</td>
                            <td>{{ $lab->Ram }}</td>
                            <td>{{ $lab->RamM }}</td>
                            <td>{{ $lab->Monitor }}</td>
                            <td>{{ $lab->MonitorM }}</td>
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
