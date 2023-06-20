@extends('adminlte::page')

@section('title', 'Software')

@section('content_header')
    <h1>Nuevo Software</h1>
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
            {!! Form::open(['route' => 'admin.software.store']) !!}

            @include('admin.Software.modal.forms')

            <div class="row mb-3">
                {!! Form::label('tipoSoftware_id', 'Categoria de Equipos', ['class' => 'col-md-3 col-form-label']) !!}

                <div class="col">
                    {!! Form::select('tipoSoftware_id', $select, null, ['class'=>'form-control']) !!}
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

