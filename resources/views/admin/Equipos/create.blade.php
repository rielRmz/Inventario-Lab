@extends('adminlte::page')

@section('title', 'Equipos')

@can('admin.equipo.create')
    @section('content_header')
        <h1>Nuevo Equipo</h1>
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
                {!! Form::open(['route' => 'admin.equipo.store']) !!}

                @include('admin.Equipos.modal.forms')

                    <div class="row mb-3">
                        {!! Form::label('marca_id', 'Marca del equipo', ['class' => 'col-md-3 col-form-label']) !!}

                        <div class="col">
                            {!! Form::select('marca_id', $select2, null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="row mb-3">
                        {!! Form::label('estatus_id', 'Estado del equipo', ['class' => 'col-md-3 col-form-label']) !!}

                        <div class="col">
                            {!! Form::select('estatus_id', $select3, null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                <div class="row mb-3">
                    {!! Form::label('tipoEquipo_id', 'Categoria de Equipos', ['class' => 'col-md-3 col-form-label']) !!}

                    <div class="col">
                        {!! Form::select('tipoEquipo_id', $select1    , null, ['class'=>'form-control']) !!}
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
