@extends('adminlte::page')

@section('title', 'Listado de Usuarios')

@can('profile.perfil.index')
    @section('content_header')
        <h1>Listado de Usuarios</h1>
    @stop

    @section('content')
        <livewire:admin.users-index/>
    @stop
@endcan

@section('css')
@stop

@section('js')
    @livewireScripts

    <script type="text/javascript">
        window.livewire.on('UsuarioDelete',() => {
           $('#DeleteUsuario').modal('hide');
        });
    </script>
@stop
