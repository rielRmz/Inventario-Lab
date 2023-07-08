@extends('adminlte::page')

@section('title', 'Dashboard')

@can('details.labEquipo.edit')
    @section('content_header')
        <h1>Editar registro del equipo intalado en el laboratorio {{ $licSoftware->Software_id }}</h1>
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

                <form action="{{ route('details.licSoftware.update', $licSoftware) }}" method="POST">
                    @csrf
                    @method('put')
                    <!-- Equipo a Desinstalar -->
                    <div class="row mb-3">
                        <label for="Software_id" class="col-md-3 col-form-label">Codigo del Software</label>
                        <div class="col-md-7">
                            <input id="Software_id" type="text" class="form-control" name="Software_id"
                                   value="{{ $licSoftware->Software_id }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Licencia_id" class="col-md-3 col-form-label">Equipo a Instalar</label>
                        <div class="col-md-7">
                            <select id="Licencia_id" type="text" class="form-control" name="Licencia_id">
                                @foreach ($Licencias as $Licencia)
                                    <option value="{{ $Licencia->No_Serie }}">
                                        {{ $Licencia->No_Serie }}
                                    </option>
                                @endforeach
                            </select>
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
