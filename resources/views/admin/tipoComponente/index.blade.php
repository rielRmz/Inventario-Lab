@extends('adminlte::page')

@section('title', 'Categoria de Componentes')

@can('admin.tipoComp.index')
    @section('content_header')
        @can('admin.tipoComp.create')
            <a class="btn btn-outline-success float-right" href="{{ route('admin.tipoComp.create') }}" role="button">Nuevo
                Componente</a>
        @endcan
        <h1>Listado de Categoria de Componentes</h1>
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
                        <th scope="col">Categoria</th>
                        @canany(['admin.tipoComp.edit','admin.tipoComp.destroy'])
                            <th scope="col" colspan="2">Opciones</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($comps as $comp)
                        <tr>
                            <td class="align-middle">{{ $comp->tipoComponente_id }}</td>
                            <td class="align-middle">{{ $comp->tipoComponente }}</td>
                            @can('admin.tipoComp.edit')
                                <td width="100px">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.tipoComp.edit', $comp) }}"
                                       role="button">Actualizacion</a>
                                </td>
                            @endcan
                            @can('admin.tipoComp.destroy')
                                <td width="100px">
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                       data-target="#ModalDelete{{ $comp->tipoComponente_id }}">
                                        Eliminar</a>
                                </td>
                                @include('admin.tipoComponente.modal.delete')
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
@stop
