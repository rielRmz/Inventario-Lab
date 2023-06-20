@extends('adminlte::page')

@section('title', 'Listado de laboratorios')

@can('details.equipoLab.destroy')
    @section('content_header')
        <h1>Editar registro del laboratorio</h1>
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

                <form action="{{ route('details.equipoLab.update', $equipoLab) }}" method="POST">
                    @csrf
                    @method('put')
                    <!-- Componente a desinstalar -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Previo Laboratorio</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="No_Serie" class="col-md-3 col-form-label">Numero de Serie</label>
                                <div class="col-md-6">
                                    <input id="No_Serie" type="text" class="form-control" name="No_Serie"
                                           value="{{ $equipoLab->No_Serie }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_laboratorio" class="col-md-3 col-form-label">Laboratorio de
                                    procedencia</label>
                                <div class="col-md-6">
                                    <input id="id_laboratorio" type="text" class="form-control" name="id_laboratorio"
                                           value="{{ $equipoLab->id_laboratorio }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="equipoLab_id" class="col-md-3 col-form-label">Identificacion de
                                    equipo</label>
                                <div class="col-md-6">
                                    <input id="equipoLab_id" type="text" class="form-control" name="equipoLab_id"
                                           value="{{ $equipoLab->equipoLab_id }}" readonly>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="fecha_Instalacion" class="col-md-3 col-form-label">Fecha de Instalacion
                                    Original</label>
                                <div class="col-md-6">
                                    <input id="fecha_Instalacion" type="date" class="form-control"
                                           name="fecha_Instalacion"
                                           value="{{ old('fecha_Instalacion', $equipoLab->fecha_Instalacion) }}"
                                           readonly>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="fecha_Desnstalacion" class="col-md-3 col-form-label">Fecha de
                                    Desinstalacion</label>
                                <div class="col-md-6">
                                    <input id="fecha_Desnstalacion" type="date" class="form-control"
                                           name="fecha_Desnstalacion" value="{{ old('fecha_Desnstalacion') }}"
                                           autocomplete="fecha_Desnstalacion">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Componente a instalar -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Nuevo Laboratorio</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="id_laboratorio" class="col-md-3 col-form-label">Laboratorio en donde se
                                    instalar</label>
                                <div class="col-md-6">
                                    <select id="id_laboratorio" type="Componente_id" class="form-control"
                                            name="id_laboratorio_A">
                                        @foreach ($Labs as $Lab)
                                            <option value="{{ $Lab->id_laboratorio }}">
                                                {{ $Lab->id_laboratorio }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="equipoLab_id" class="col-md-3 col-form-label">Identificacion de
                                    equipo</label>
                                <div class="col-md-6">
                                    <input id="equipoLab_id" type="text" class="form-control" name="equipoLab_id_A"
                                           value="">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="fecha_Instalacion" class="col-md-3 col-form-label">Fecha de
                                    Instalacion</label>
                                <div class="col-md-6">
                                    <input id="fecha_Instalacion" type="date" class="form-control"
                                           name="fecha_Instalacion_A"
                                           value="{{ old('fecha_Instalacion') }}" autocomplete="fecha_Instalacion">
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
