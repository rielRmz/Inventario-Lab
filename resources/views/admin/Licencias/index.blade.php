@extends('adminlte::page')

@section('title', 'Licencias')

@can('admin.licencias.index')
    @section('content_header')
        @can('admin.licencias.create')
            <a class="btn btn-outline-success float-right" href="{{ route('admin.licencias.create') }}" role="button">Nueva Licencia</a>
        @endcan
        <h1>Listado de Licencias</h1>
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
                        <th scope="col">No de Serie</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de Activación</th>
                        <th scope="col">Fecha de Caducación</th>
                        @canany(['admin.licencias.create','admin.licencias.destroy'])
                            <th scope="col" colspan="3">Opciones</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($licencias as $lic)
                        <tr>
                            <td class="align-middle">{{ $lic->No_Serie }}</td>
                            <td class="align-middle">{{ $lic->descripcion }}</td>
                            <td class="align-middle">{{ $lic->fecha_Activacion }}</td>
                            <td class="align-middle">{{ $lic->fecha_Caducacion }}</td>
                            @can('admin.licencias.edit')
                                <td width="5px">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.licencias.edit', $lic) }}"
                                       role="button">Actualizacion</a>
                            @endcan
                            @can('admin.licencias.destroy')
                                <td width="5px">
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                       data-target="#ModalDelete{{ $lic->No_Serie }}">
                                        Eliminar</a>
                                </td>
                            @endcan
                            @include('admin.Licencias.modal.delete')
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
