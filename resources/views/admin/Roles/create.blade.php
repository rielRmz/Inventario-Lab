@extends('adminlte::page')

@section('title', 'Roles')

@can('admin.roles.create')
    @section('content_header')
        <h1>Crear Nuevo Rol</h1>
    @stop

    @section('content')
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif

                {!! Form::open(['route' => 'admin.roles.store']) !!}

                @include('admin.Roles.modal.form')

                <div class="row-3 mb-0">
                    <div class="col-md-8 offset-md-4">
                        {!! Form::submit('Crear rol', ['class' => 'btn btn-outline-primary']) !!}
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
