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
                        {!! Form::label('marca_id', 'Marca', ['class' => 'col-md-3 col-form-label']) !!}

                        <div class="col">
                            {!! Form::select('marca_id', $select2, null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="row mb-3">
                        {!! Form::label('estatus_id', 'Estado', ['class' => 'col-md-3 col-form-label']) !!}

                        <div class="col">
                            {!! Form::select('estatus_id', $select3, null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                <div class="row mb-3">
                    {!! Form::label('tipoEquipo_id', 'Categoria', ['class' => 'col-md-3 col-form-label']) !!}

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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
