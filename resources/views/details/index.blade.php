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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
@stop
