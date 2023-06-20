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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts
    <script> console.log('Hi!'); </script>
@stop
