@extends('layouts.appCustom')

@section('content')
    <div class="card">
        <div class="card-header">
            <img src="{{ public_path('images/banner_top_itc.jpg') }}" alt="banner">
        </div>
        @if($equipos->count())
            <div class="card-body">
                <table class="content-table table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Numero de Serie</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estado del Equipo</th>
                        <th scope="col">Marca del Equipo</th>
                        <th scope="col">Categoria del Equipo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($equipos as $equipo)
                        <tr>
                            <td>{{ $equipo->No_Serie }}</td>
                            <td>{{ $equipo->descripcion }}</td>
                            <td>{{ $equipo->estatus }}</td>
                            <td>{{ $equipo->marca }}</td>
                            <td>{{ $equipo->tipoEquipo}}</td>
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
