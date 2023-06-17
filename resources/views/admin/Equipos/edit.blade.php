@extends('adminlte::page')

@section('title', 'Equipos')

@can('admin.equipo.edit')
    @section('content_header')
        <h1>Actualizar Equipo</h1>
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
                {!! Form::model($equipo, ['route' => ['admin.equipo.update', $equipo], 'method' => 'put']) !!}

                @include('admin.Equipos.modal.forms')

                <div class="row mb-3">
                    <label for="marca_id" class="col-md-3 col-form-label">Marca del Componente</label>
                    <div class="col">
                        <select id="marca_id" type="marca_id" class="form-control"
                                name="marca_id" required>
                            <optgroup label="--Opcion Seleccionada--">
                                <option value="{{ $equipo->marca_id }}" selected>
                                    {{ $equipo->marca }}
                                </option>
                            </optgroup>
                            <optgroup label="--Tipos de Software--">
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">
                                        {{ $marca->descripcion }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="estatus_id" class="col-md-3 col-form-label">Estado del Componente</label>
                    <div class="col">
                        <select id="estatus_id" type="estatus_id" class="form-control"
                                name="estatus_id" required>
                            <optgroup label="--Opcion Seleccionada--">
                                <option value="{{ $equipo->estatus_id }}" selected>
                                    {{ $equipo->estatus }}
                                </option>
                            </optgroup>
                            <optgroup label="--Tipos de Software--">
                                @foreach ($status as $estatus)
                                    <option value="{{ $estatus->id }}">
                                        {{ $estatus->descripcion }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tipoEquipo_id" class="col-md-3 col-form-label">Categoria del Equipo</label>
                    <div class="col">
                        <select id="tipoEquipo_id" type="tipoEquipo_id" class="form-control" name="tipoEquipo_id"
                                required>
                            <optgroup label="--Opcion Seleccionada--">
                                <option value="{{ $equipo->tipoEquipo_id }}" selected>
                                    {{ $equipo->tipoEquipo_id }}
                                </option>
                            </optgroup>
                            <optgroup label="--Tipos de Equipos--">
                                @foreach ($tipoEquipos as $tipoEquipo)
                                    <option value="{{ $tipoEquipo->tipoEquipo_id }}">
                                        {{ $tipoEquipo->tipoEquipo }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="row-3 mb-0">
                    <div class="col-md-8 offset-md-4">
                        {!! Form::submit('Crear Categoria', ['class' => 'btn btn-outline-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    @stop
@endcan

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
@stop
