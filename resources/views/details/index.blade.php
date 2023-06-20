@extends('adminlte::page')

@section('title', 'Pantalla de Administrador')

@can('admin.equipo.show')
    @section('content_header')
        <div class="card">
            <div class="card-header">
                <h3>Detalles del Equipo: {{ $No_Serie }}</h3>
            </div>
        </div>
    @stop

    @section('content')
        @if(session()->get('message'))
            @switch(session()->get('type'))
                @case('store')
                    <div class="alert alert-success" role="alert">
                        {{session()->get('message')}}
                    </div>
                    @break;
                @case('update')
                    <div class="alert alert-warning" role="alert">
                        {{session()->get('message')}}
                    </div>
                    @break;
                @case('destroy')
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('message')}}
                    </div>
                    @break;
            @endswitch
        @endif

        <livewire:admin.equipos-details :no_serie="$No_Serie"/>
    @stop
@endcan

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts
    <script> console.log('Hi!'); </script>
@stop
