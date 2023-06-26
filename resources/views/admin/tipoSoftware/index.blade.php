@extends('adminlte::page')

@section('title', 'Categoria de Softwares')

@can('admin.tipoSoft.index')
    @section('content_header')
        @can('admin.tipoSoft.create')
            <a class="btn btn-outline-success float-right" href="{{ route('admin.tipoSoft.create') }}" role="button">Nuevo
                Software</a>
        @endcan
        <h1>Listado de Categoria de Software</h1>
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
                        <th scope="col">Id de la Categoria</th>
                        <th scope="col">Descripción</th>
                        @canany(['admin.tipoSoft.edit','admin.tipoSoft.destroy'])
                            <th scope="col" colspan="2">Opciones</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($softs as $soft)
                        <tr>
                            <td class="align-middle">{{ $soft->tipoSoftware_id }}</td>
                            <td class="align-middle">{{ $soft->tipoSoftware }}</td>
                            @can('admin.tipoSoft.edit')
                                <td width="100px">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.tipoSoft.edit', $soft) }}"
                                       role="button">Actualizacion</a>
                                </td>
                            @endcan
                            @can('admin.tipoSoft.destroy')
                                <td width="100px">
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                       data-target="#ModalDelete{{ $soft->tipoSoftware_id }}">
                                        Eliminar</a>
                                </td>
                                @include('admin.tipoSoftware.modal.delete')
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
