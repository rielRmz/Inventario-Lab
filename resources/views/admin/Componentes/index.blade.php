@extends('adminlte::page')

@section('title', 'Roles')

@can('admin.componente.index')
    @section('content_header')
        @can('admin.componente.create')
            <a class="btn btn-outline-success float-right" href="{{ route('admin.componente.create') }}" role="button">Nuevo
                Componente</a>
        @endcan
        <h1>Listado de Componentes</h1>
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
                        <th scope="col">Numero de Serie</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Categoria</th>
                        @canany(['admin.componente.edit','admin.componente.destroy'])
                            <th scope="col" colspan="2">Opciones</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($comps as $comp)
                        <tr>
                            <td>{{ $comp->No_Serie }}</td>
                            <td>{{ $comp->descripcion }}</td>
                            <td>{{ $comp->estatus }}</td>
                            <td>{{ $comp->marca }}</td>
                            <td>{{ $comp->tipoComponente}}</td>
                            @can('admin.componente.edit')
                                <td width="10px">
                                    <a class="btn btn-outline-primary"
                                       href="{{ route('admin.componente.edit', $comp) }}"
                                       role="button">Actualizacion</a>
                                </td>
                            @endcan
                            @can('admin.componente.destroy')
                                <td width="100px">
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                       data-target="#ModalDelete{{ $comp->No_Serie }}">
                                        Eliminar</a>
                                </td>
                                @include('admin.Componentes.modal.delete')
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $comps->links() }}
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
