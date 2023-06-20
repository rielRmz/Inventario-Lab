@extends('adminlte::page')

@section('title', 'Listado de componentes')

@can('details.equipoComp.create')
    @section('content_header')
        <h1>Instalar nuevo componente en el equipo: {{ $equipo }}</h1>
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

                <form action="{{ route('details.equipoComp.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="No_Serie" class="col-md-3 col-form-label">Numero de Serie</label>
                        <div class="col-md-6">
                            <input id="No_Serie" type="text" class="form-control" name="No_Serie"
                                   value="{{ $equipo }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Componente_id" class="col-md-3 col-form-label">Categoria del
                            Componente</label>
                        <div class="col-md-6">
                            <select id="Componente_id" type="Componente_id" class="form-control" name="Componente_id">
                                @foreach ($Comps as $Comp)
                                    <option value="{{ $Comp->No_Serie }}">
                                        {{ $Comp->No_Serie }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="fecha_Instalacion" class="col-md-3 col-form-label">Marca del
                            Componente</label>
                        <div class="col-md-6">
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
