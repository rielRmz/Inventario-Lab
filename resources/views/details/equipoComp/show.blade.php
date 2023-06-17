@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    <label hidden>{{$No_Serie}}</label>
    <div class="card">
        <div class="card-header">
            <h1>Listado de componentes del equipo</h1>
        </div>

    </div>

@endsection
