@extends('adminlte::page')

@section('title', 'Roles')

@can('admin.roles.edit')
    @section('content_header')
        <h1>Editar Rol</h1>
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

                {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

                @include('admin.Roles.modal.form')

                <div class="row-3 mb-0">
                    <div class="col-md-8 offset-md-4">
                        {!! Form::submit('Editar rol', ['class' => 'btn btn-outline-primary']) !!}
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
