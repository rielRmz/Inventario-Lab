@extends('adminlte::page')

@section('title', 'Laboratorios')

@can('admin.labs.index')
    @section('content_header')
        @can('admin.labs.index')
            <a class="btn btn-outline-success float-right" href="{{ route('admin.labs.create') }}" role="button">Nuevo
                Laboratorio</a>
        @endcan
        <h1>Listado de Laboratorios/Almacenes</h1>
    @stop

    @section('content')
        <!-- Interfaz -->
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
                        <th scope="col">Id del laboratorio</th>
                        <th scope="col">Descripción</th>
                        @canany(['admin.labs.edit','admin.labs.destroy','details.labEquipo.index'])
                        <th scope="col" colspan="3">Opciones</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($labs as $lab)
                        <tr>
                            <td class="align-middle">{{ $lab->id_laboratorio }}</td>
                            <td class="align-middle">{{ $lab->laboratorio }}</td>
                            @can('admin.labs.edit')
                                <td width="5px">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.labs.edit', $lab) }}"
                                       role="button">Actualizacion</a>
                            @endcan
                            @can('admin.labs.destroy')
                                <td width="5px">
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                       data-target="#ModalDelete{{ $lab->id_laboratorio }}">
                                        Eliminar</a>
                                </td>
                            @endcan
                            @can('details.labEquipo.index')
                                <td width="5px">
                                    <a class="btn btn-outline-warning"
                                       href="{{ route('details.labEquipo.index', $lab->id_laboratorio) }}"
                                       role="button">Detalles</a>
                                </td>
                                @include('admin.Laboratorios.modal.delete')
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
