@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <div class="card">
        <div class="card-header">
            <h3>Generador de Reportes</h3>
        </div>
    </div>
@stop

@section('content')
    <livewire:reportes.index/>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts
    <script> console.log('Hi!'); </script>
@stop

