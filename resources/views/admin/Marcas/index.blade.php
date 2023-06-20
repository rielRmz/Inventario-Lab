@extends('adminlte::page')

@section('title', 'Categoria de Componentes')

@section('content_header')
    <a class="btn btn-outline-success float-right" href="{{ route('admin.marcas.create') }}" role="button">Nueva
        Marca</a>
    <h1>Listado de Marcas</h1>
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
                    <th scope="col">Id</th>
                    <th scope="col">Descripción</th>
                    <th scope="col" colspan="2">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($marcas as $marca)
                    <tr>
                        <td class="align-middle">{{ $marca-> id }}</td>
                        <td class="align-middle">{{ $marca->descripcion }}</td>
                        <td width="100px">
                            <a class="btn btn-outline-primary" href="{{ route('admin.marcas.edit', $marca) }}"
                               role="button">Actualizacion</a>
                        </td>
                        <td width="100px">
                            <a class="btn btn-outline-danger" data-toggle="modal"
                               data-target="#ModalDelete{{ $marca->id }}">
                                Eliminar</a>
                        </td>
                        @include('admin.Marcas.modal.delete')
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
