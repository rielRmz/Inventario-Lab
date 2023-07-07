@extends('adminlte::page')

@section('title', 'Actualizar Licencia')

@can('admin.licencias.edit')
@endcan
@section('content_header')
    <h1>Actualizar Licencia</h1>
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
            {!! Form::model($licencia, ['route' => ['admin.licencias.update', $licencia], 'method' => 'put']) !!}

            @include('admin.Licencias.modal.forms')

            <div class="row-3 mb-0">
                <div class="col-md-8 offset-md-4">
                    {!! Form::submit('Actualizar Licencias', ['class' => 'btn btn-outline-primary']) !!}
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
