@extends('adminlte::page')

@section('title', 'Laboratorios')

@section('content_header')
    <h1>Actualizar Laboratorio</h1>
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
            {!! Form::model($lab, ['route' => ['admin.labs.update', $lab], 'method' => 'put']) !!}

            @include('admin.Laboratorios.modal.forms')

            <div class="row-3 mb-0">
                <div class="col-md-8 offset-md-4">
                    {!! Form::submit('Actualizar Categoria', ['class' => 'btn btn-outline-primary']) !!}
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
