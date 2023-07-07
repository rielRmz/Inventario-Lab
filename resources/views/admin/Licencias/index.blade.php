@extends('adminlte::page')

@section('title', 'Licencias')

@section('content_header')
    <a class="btn btn-outline-success float-right" href="{{ route('admin.licencias.create') }}" role="button">Nueva Licencia</a>
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
                    <th scope="col" colspan="3">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($licencias as $licencia)
                    <tr>
                        <td class="align-middle">{{ $lab->id_laboratorio }}</td>
                        <td class="align-middle">{{ $lab->laboratorio }}</td>
                        <td width="5px">
                            <a class="btn btn-outline-primary" href="{{ route('admin.licencias.edit', $lab) }}"
                               role="button">Actualizacion</a>
                        <td width="5px">
                            <a class="btn btn-outline-danger" data-toggle="modal"
                               data-target="#ModalDelete{{ $lab->id_laboratorio }}">
                                Eliminar</a>
                        </td>
                        <td width="5px">
                            <a class="btn btn-outline-warning"
                               href="{{ route('details.labEquipo.index', $lab->id_laboratorio) }}"
                               role="button">Detalles</a>
                        </td>
                        @include('admin.Laboratorios.modal.delete')
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
