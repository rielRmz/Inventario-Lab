@extends('adminlte::page')

@section('title', 'Componente')

@can('admin.componente.edit')
    @section('content_header')
        <h1>Actualizar Componente</h1>
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
                    {!! Form::model($comps, ['route' => ['admin.componente.update', $comps], 'method' => 'put']) !!}

                    @include('admin.Componentes.modal.forms')

                    <div class="row mb-3">
                        <label for="marca_id" class="col-md-3 col-form-label">Marca</label>
                        <div class="col">
                            <select id="marca_id" type="marca_id" class="form-control"
                                    name="marca_id" required>
                                <optgroup label="--Opcion Seleccionada--">
                                    <option value="{{ $comps->marca_id }}" selected>
                                        {{ $comps->marca }}
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
                        <label for="estatus_id" class="col-md-3 col-form-label">Estado</label>
                        <div class="col">
                            <select id="estatus_id" type="estatus_id" class="form-control"
                                    name="estatus_id" required>
                                <optgroup label="--Opcion Seleccionada--">
                                    <option value="{{ $comps->estatus_id }}" selected>
                                        {{ $comps->estatus }}
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
                        <label for="tipoComponente_id" class="col-md-3 col-form-label">Categoria</label>
                        <div class="col">
                            <select id="tipoComponente_id" type="tipoComponente_id" class="form-control"
                                    name="tipoComponente_id" required>
                                <optgroup label="--Opcion Seleccionada--">
                                    <option value="{{ $comps->tipoComponente_id }}" selected>
                                        {{ $comps->tipoComponente_id }}
                                    </option>
                                </optgroup>
                                <optgroup label="--Tipos de Software--">
                                    @foreach ($tipoComps as $tipoComp)
                                        <option value="{{ $tipoComp->tipoComponente_id }}">
                                            {{ $tipoComp->tipoComponente_id }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="row-3 mb-0">
                        <div class="col-md-8 offset-md-4">
                            {!! Form::submit('Actualizar Componente', ['class' => 'btn btn-outline-primary    ']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
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
