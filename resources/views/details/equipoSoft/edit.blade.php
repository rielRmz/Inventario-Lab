@extends('adminlte::page')

@section('title', 'Listado de Softwares')

@section('content_header')
    <h1>Editar registro del Software</h1>
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

            <form action="{{ route('details.equipoSoft.update', $equipoSoft) }}" method="POST">
                @csrf
                @method('put')
                <!-- Componente a desinstalar -->
                <div class="card">
                    <div class="card-header">
                        <h4>Software a Desinstalar</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="No_Serie" class="col-md-3 col-form-label"><Numero></Numero> de Serie</label>
                            <div class="col-md-6">
                                <input id="No_Serie" type="text" class="form-control" name="No_Serie"
                                       value="{{ $equipoSoft->No_Serie }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Software_id" class="col-md-3 col-form-label">Software instalado</label>
                            <div class="col-md-6">
                                <input id="Software_id" type="text" class="form-control" name="Software_id"
                                       value="{{ $equipoSoft->Software_id }}" readonly>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="fecha_Instalacion" class="col-md-3 col-form-label">Fecha de Instalacion Original</label>
                            <div class="col-md-6">
                                <input id="fecha_Instalacion" type="date" class="form-control" name="fecha_Instalacion"
                                       value="{{ old('fecha_Instalacion', $equipoSoft->fecha_Instalacion) }}"
                                       required readonly>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="fecha_Desnstalacion" class="col-md-3 col-form-label">Fecha de Desinstalacion</label>
                            <div class="col-md-6">
                                <input id="fecha_Desnstalacion" type="date" class="form-control" name="fecha_Desnstalacion" value="{{ old('fecha_Desnstalacion') }}"
                                       required autocomplete="fecha_Desnstalacion">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="motivo" class="col-md-3 col-form-label">Motivo tras la Actualizacion</label>
                            <div class="col-md-6">
                        <textarea class="form-control" name="motivo" id="motivo" required autocomplete="motivo" rows="3">
                            {{ $equipoSoft->motivo }}
                        </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Componente a instalar -->
                <div class="card">
                    <div class="card-header">
                        <h4>Nuevo Software a Instalar</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="Software_id" class="col-md-3 col-form-label">Nuevo componente a instalar</label>
                            <div class="col-md-6">
                                <select id="Software_id" type="Componente_id" class="form-control" name="Software_id_A"
                                        required>
                                    @foreach ($Softs as $Soft)
                                        <option value="{{ $Soft->Software_id }}">
                                            {{ $Soft->Software_id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="fecha_Instalacion" class="col-md-3 col-form-label">Fecha de Instalacion</label>
                            <div class="col-md-6">
                                <input id="fecha_Instalacion" type="date" class="form-control" name="fecha_Instalacion_A" value="{{ old('fecha_Instalacion') }}"
                                       required autocomplete="fecha_Instalacion">
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
