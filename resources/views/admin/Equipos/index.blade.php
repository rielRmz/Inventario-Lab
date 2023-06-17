@extends('adminlte::page')

@section('title', 'Equipos')

@can('admin.equipo.index')
    @section('content_header')
        @can('admin.equipo.create')
            <a href="{{ route('admin.equipo.create') }}" class="btn btn-outline-success float-right">Nuevo
                Equipo</a>
        @endcan
        <a href="{{ route('admin.equipo.pdf') }}" class="btn btn-outline-success float-right">Generar Reporte</a>
        <h1>Listado de Equipos</h1>
    @stop

    @section('content')
        <livewire:admin.equipos-index/>
    @stop
@endcan

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
@stop
