@extends('adminlte::page')

@section('title', 'Listado de Licencias')

@can('details.licSoftware.index')
    @section('content_header')
        @can('details.licSoftware.index')
        @endcanany
        <a class="btn btn-outline-success float-right" href="{{ route('details.licSoftware.create', $Software_id) }}"
           role="button">Agregar Detalle</a>
        <h1>Listado de Licencias pertenecientes al Software: {{ $Software_id }}</h1>
    @stop

    @section('content')
        <div class="card">
            @if($licSoftwares->count())
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
                            <th scope="col">No de Serie del equipo</th>
                            <th scope="col">laboratorio</th>
                            <th scope="col">Fecha de Instalacion</th>
                            <th scope="col">Fecha de Desinstalacion</th>
                            <th scope="col">Identificador del equipo</th>
                            @canany(['details.licSoftware.edit, details.licSoftware.destroy'])
                            @endcanany
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($licSoftwares as $licSoftware)
                            <tr>
                                <td>{{ $licSoftware->Software }}</td>
                                <td>{{ $licSoftware->Licencia }}</td>
                                <td>{{ $licSoftware->fecha_Activacion }}</td>
                                <td>{{ $licSoftware->fecha_Caducacion }}</td>
                                @can('details.licSoftware.edit')
                                    <td width="10px">
                                        <a class="btn btn-outline-info"
                                           href="{{ route('details.licSoftware.edit', $licSoftware) }}"
                                           role="button">Actualizacion</a>
                                    </td>
                                @endcan
                                @can('details.licSoftware.destroy')
                                    <td width="10px">
                                        <a class="btn btn-outline-danger" data-toggle="modal"
                                           data-target="#ModalDelete{{ $licSoftware->id }}">
                                            Eliminar</a>
                                    </td>
                                @endcan
                                @include('details.SoftsLics.modal.delete')
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="card-body">
                    <strong>
                        No hay registros
                    </strong>
                </div>
            @endif
        </div>
    @stop
@endcan

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
