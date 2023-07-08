@extends('adminlte::page')

@section('title', 'Dashboard')

@can('details.labEquipo.create')
@section('content_header')
    <h1>Instalar nuevo equipo en el laboratorio {{ $id_lab }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('details.labEquipo.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="id_laboratorio" class="col-md-3 col-form-label">Identificador del Laboratorio</label>
                    <div class="col-md-7">
                        <input id="id_laboratorio" type="text" class="form-control" name="id_laboratorio"
                               value="{{ $id_lab }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="No_Serie" class="col-md-3 col-form-label">Equipo a Instalar</label>
                    <div class="col-md-7">
                        <select id="No_Serie" type="Componente_id" class="form-control" name="No_Serie">
                            @foreach ($Equipos as $Equipo)
                                <option value="{{ $Equipo->No_Serie }}">
                                    {{ $Equipo->No_Serie }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="equipoLab_id" class="col-md-3 col-form-label">Identificador del equipo</label>
                    <div class="col-md-7">
                        <input id="equipoLab_id" type="text" class="form-control" name="equipoLab_id"
                               value=""  placeholder="El ID del equipo se conforma del ID del laboratorio seguido un guion alto y un numero, ejemplo: {{ $id_lab }}-12">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="fecha_Instalacion" class="col-md-3 col-form-label">Marca del
                        Componente</label>
                    <div class="col-md-7">
                        <input id="fecha_Instalacion" type="date" class="form-control" name="fecha_Instalacion"
                               value="{{ old('fecha_Instalacion') }}" autocomplete="fecha_Instalacion">
                    </div>
                </div>

                <div class="row-3 mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary">Crear Detalle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@endcan

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
