@extends('adminlte::page')

@section('title', 'Software')

@section('content_header')
    <h1>Actualizar Software</h1>
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
            {!! Form::model($soft, ['route' => ['admin.software.update', $soft], 'method' => 'put']) !!}
                @include('admin.Software.modal.forms')

                <div class="row mb-3">
                    <label for="tipoSoftware_id" class="col-md-3 col-form-label">Categoria del
                        Software</label>
                    <div class="col">
                        <select id="tipoSoftware_id" type="tipoSoftware_id" class="form-control" name="tipoSoftware_id"
                                required>
                            <optgroup label="--Opcion Seleccionada--">
                                <option value="{{ $soft->tipoSoftware_id }}" selected>
                                    {{ $soft->tipoSoftware_id }}
                                </option>
                            </optgroup>
                            <optgroup label="--Tipos de Software--">
                                @foreach ($tipoSofts as $tipoSoft)
                                    <option value="{{ $tipoSoft->tipoSoftware_id }}">
                                        {{ $tipoSoft->tipoSoftware }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>


                <div class="row-3 mb-0">
                    <div class="col-md-8 offset-md-4">
                        {!! Form::submit('Crear Equipo', ['class' => 'btn btn-outline-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stop

