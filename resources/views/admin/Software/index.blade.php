@extends('adminlte::page')

@section('title', 'Software')

@can('admin.software.index')
    @section('content_header')
        @can('admin.software.create')
            <a class="btn btn-outline-success float-right" href="{{ route('admin.software.create') }}" role="button">Nuevo
                Software</a>
        @endcan
        <h1>Listado de Software</h1>
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
                        <th scope="col">Id del Software</th>
                        <th scope="col">Software</th>
                        <th scope="col">Categoria</th>
                        @canany(['admin.software.edit','admin.software.destroy'])
                            <th scope="col" colspan="2">Opciones</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($softs as $soft)
                        <tr>
                            <td>{{ $soft->Software_id }}</td>
                            <td>{{ $soft->descripcion }}</td>
                            <td>{{ $soft->tipoSoftware_id}}</td>
                            @can('admin.software.edit')
                                <td width="10px">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.software.edit', $soft) }}"
                                       role="button">Actualizacion</a>
                                </td>
                            @endcan
                            @can('admin.software.destroy')
                                <td width="10px">
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                       data-target="#ModalDelete{{ $soft->Software_id }}">
                                        Eliminar</a>
                                </td>
                                @include('admin.Software.modal.delete')
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $softs->links() }}
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

