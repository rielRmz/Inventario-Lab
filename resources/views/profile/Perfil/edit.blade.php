@extends('adminlte::page')

@section('title', 'Actualizar Usuario')

@section('content_header')
    <h1>Actualizar Usuario</h1>
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
            <form action="{{ route('profile.perfil.update') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-3 col-form-label"><strong>Nombre:</strong></label>
                    <div class="col">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name', Auth::user()->name) }}" required
                               autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-3 col-form-label"><strong>Correo Electronico:</strong></label>
                    <div class="col">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email', Auth::user()->email) }}" required
                               autocomplete="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-3 col-form-label"><strong>Nueva Contraseña:</strong></label>
                    <div class="col">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="new-password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-3 col-form-label"><strong>Confirmar Contraseña:</strong></label>
                    <div class="col">
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-7 offset-md-4">
                        <button type="submit" class="btn btn-outline-success">Actualizar Usuario</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop

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



