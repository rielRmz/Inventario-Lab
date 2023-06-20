@extends('adminlte::page')

@section('title', 'Roles')

@can('admin.roles.index')
    @section('content_header')
        @can('admin.roles.create')
            <a class="btn btn-outline-success float-right" href="{{ route('admin.roles.create') }}" role="button">Nuevo
                Rol</a>
        @endcan
        <h1>Listado de roles</h1>
    @stop

    @section('content')
        <div class="card">
            <div class="card-body">
                @if(session()->get('message'))
                    @switch(session()->get('type'))
                        @case('store')
                            <div class="alert alert-success" role="alert">
                                {{session()->get('message')}}
                            </div>
                            @break;
                        @case('update')
                            <div class="alert alert-warning" role="alert">
                                {{session()->get('message')}}
                            </div>
                            @break;
                        @case('destroy')
                            <div class="alert alert-danger" role="alert">
                                {{session()->get('message')}}
                            </div>
                            @break;
                    @endswitch
                @endif

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id del Rol</th>
                        <th scope="col">Roles</th>
                        @canany(['admin.roles.edit','admin.roles.destroy'])
                            <th scope="col" colspan="2">Opciones</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="align-middle" width="250px">{{ $role->id }}</td>
                            <td class="align-middle">{{ $role->name }}</td>
                            @can('admin.roles.edit')
                                <td width="170px">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.roles.edit', $role) }}"
                                       role="button">Asignar Permiso</a>
                                </td>
                            @endcan
                            @can('admin.roles.destroy')
                                <td width="20px">
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                       data-target="#ModalDelete{{ $role->id }}"
                                    >{{ __('Delete') }}</a>
                                </td>
                                @include('admin.Roles.modal.delete')
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
