@extends('adminlte::page')

@section('title', 'Dashboard')

@can('details.labEquipo.edit')
    @section('content_header')
        <h1>Editar registro del equipo intalado en el laboratorio {{ $labEquipo->id_laboratorio }}</h1>
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

                <form action="{{ route('details.labEquipo.update', $labEquipo) }}" method="POST">
                    @csrf
                    @method('put')
                    <!-- Equipo a Desinstalar -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Equipo a Desinstalar</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="id_laboratorio" class="col-md-3 col-form-label">Identificador del
                                    Laboratorio</label>
                                <div class="col-md-7">
                                    <input id="id_laboratorio" type="text" class="form-control" name="id_laboratorio"
                                           value="{{ $labEquipo->id_laboratorio }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="No_Serie" class="col-md-3 col-form-label">No de Serie del equipo</label>
                                <div class="col-md-7">
                                    <input id="No_Serie" type="text" class="form-control" name="No_Serie"
                                           value="{{ $labEquipo->No_Serie }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="equipoLab_id" class="col-md-3 col-form-label">Identificador del
                                    equipo</label>
                                <div class="col-md-7">
                                    <input id="equipoLab_id" type="text" class="form-control" name="equipoLab_id"
                                           value="{{ $labEquipo->equipoLab_id }}" readonly>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="fecha_Instalacion" class="col-md-3 col-form-label">Fecha de
                                    Instalacion</label>
                                <div class="col-md-7">
                                    <input id="fecha_Instalacion" type="date" class="form-control"
                                           name="fecha_Instalacion"
                                           value="{{ old('fecha_Instalacion', $labEquipo->fecha_Instalacion) }}"
                                           readonly>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="fecha_Desnstalacion" class="col-md-3 col-form-label">Fecha de
                                    DesInstalacion</label>
                                <div class="col-md-7">
                                    <input id="fecha_Desnstalacion" type="date" class="form-control"
                                           name="fecha_Desnstalacion"
                                           value="{{ old('fecha_Desnstalacion') }}" autocomplete="fecha_Desnstalacion">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Equipo a Instalar -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Equipo nuevo a Instalar</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="No_Serie" class="col-md-3 col-form-label">Equipo a Instalar</label>
                                <div class="col-md-7">
                                    <select id="No_Serie" type="Componente_id" class="form-control" name="No_Serie_A">
                                        @foreach ($Equipos as $Equipo)
                                            <option value="{{ $Equipo->No_Serie }}">
                                                {{ $Equipo->No_Serie }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="equipoLab_id" class="col-md-3 col-form-label">Identificador del
                                    equipo</label>
                                <div class="col-md-7">
                                    <input id="equipoLab_id" type="text" class="form-control" name="equipoLab_id_A"
                                           value="{{ $labEquipo->equipoLab_id }}">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="fecha_Instalacion" class="col-md-3 col-form-label">Fecha de
                                    Instalacion</label>
                                <div class="col-md-7">
                                    <input id="fecha_Instalacion" type="date" class="form-control"
                                           name="fecha_Instalacion_A"
                                           value="{{ old('fecha_Instalacion_A') }}" autocomplete="fecha_Instalacion">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-3 mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary">Editar Detalle</button>
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
