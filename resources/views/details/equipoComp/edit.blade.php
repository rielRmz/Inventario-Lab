@extends('adminlte::page')

@section('title', 'Listado de componentes')

@can('details.equipoComp.edit')
    @section('content_header')
        <h1>Editar registro del componente</h1>
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

                <form action="{{ route('details.equipoComp.update', $equipoComp) }}" method="POST">
                    @csrf
                    @method('put')
                    <!-- Componente a desinstalar -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Componente a Desinstalar</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="No_Serie" class="col-md-3 col-form-label">Numero de Serie del Equipo</label>
                                <div class="col-md-6">
                                    <input id="No_Serie" type="text" class="form-control" name="No_Serie"
                                           value="{{ $equipoComp->No_Serie }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Componente_id" class="col-md-3 col-form-label">Numero de Serie del Componente instalado</label>
                                <div class="col-md-6">
                                    <input id="Componente_id" type="text" class="form-control" name="Componente_id"
                                           value="{{ $equipoComp->No_Serie }}" readonly>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="fecha_Instalacion" class="col-md-3 col-form-label">Fecha de Instalacion
                                    Original</label>
                                <div class="col-md-6">
                                    <input id="fecha_Instalacion" type="date" class="form-control"
                                           name="fecha_Instalacion"
                                           value="{{ old('fecha_Instalacion', $equipoComp->fecha_Instalacion) }}"
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
                            <div class="row mb-3">
                                <label for="motivo" class="col-md-3 col-form-label">Motivo tras la Actualizacion</label>
                                <div class="col-md-6">
                        <textarea class="form-control" name="motivo" id="motivo" autocomplete="motivo" rows="3">
                            {{ $equipoComp->motivo }}
                        </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Componente a instalar -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Componente a Instalar</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="Componente_id" class="col-md-3 col-form-label">Numero de Serie del Nuevo Componente</label>
                                <div class="col-md-6">
                                    <select id="Componente_id" type="Componente_id" class="form-control"
                                            name="Componente_id_A">
                                        @foreach ($Comps as $Comp)
                                            <option value="{{ $Comp->Componente_id }}">
                                                {{ $Comp->Componente_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="fecha_Instalacion" class="col-md-3 col-form-label">Fecha de
                                    Instalacion</label>
                                <div class="col-md-6">
                                    <input id="fecha_Instalacion" type="date" class="form-control"
                                           name="fecha_Instalacion_A" value="{{ old('fecha_Instalacion') }}"
                                           autocomplete="fecha_Instalacion">
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
