@extends('adminlte::page')

@section('title', 'Pantalla de Administrador')

@section('content_header')
    <div class="card">
        <div class="card-header">
            <h3>Detalles del Equipo</h3>
        </div>
    </div>
@stop

@section('content')
    <livewire:hisorial.index/>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts
    <script> console.log('Hi!'); </script>
@stop
