@extends('adminlte::page')

@section('title', 'Asignacion de Roles')

@can('profile.perfil.assignRoles')
    @section('content_header')
        <h1>Asignar Roles al usuario: {{ $user->name }}</h1>
    @stop

    @section('content')
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
        @if(session()->get('message'))
            <div class="alert alert-success" role="alert">
                <strong>Success: </strong>{{session()->get('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <p class="h5">Nombre: </p>
                <p class="form-control">{{ $user->name }}</p>


                <h2 class="h5">
                    Listado de roles
                </h2>
                {!! Form::model($user, ['route' => ['profile.perfil.storeRoles', $user], 'method' => 'put']) !!}
                @foreach($roles as $role)
                    <div>
                        <label for="">
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach

                <div class="row-3 mb-0">
                    <div class="col-md-8 offset-md-4">
                        {!! Form::submit('Asignar rol', ['class' => 'btn btn-outline-primary']) !!}
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
