@extends('adminlte::page')

@section('title', 'Dashboard')

@can('details.labEquipo.index')
    @can('details.equipoLab.index')
        @section('content_header')
            @can('details.labEquipo.create')
                <a class="btn btn-outline-success float-right" href="{{ route('details.labEquipo.create', $id_lab) }}"
                   role="button">Agregar</a>
            @endcan
            <h1>Listado de Equipos pertenecientes al labotario {{$id_lab}}</h1>
        @stop

        @section('content')
            <div class="card">
                @if($labEquipos->count())
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
                                @canany(['details.labEquipo.edit','details.labEquipo.destroy'])
                                    <th scope="col" colspan="2">Opciones</th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($labEquipos as $labEquipo)
                                <tr>
                                    <td>{{ $labEquipo->No_Serie }}</td>
                                    <td>{{ $labEquipo->id_laboratorio }}</td>
                                    <td>{{ $labEquipo->fecha_Instalacion }}</td>
                                    <td>{{ $labEquipo->fecha_Desnstalacion }}</td>
                                    <td>{{ $labEquipo->equipoLab_id }}</td>
                                    @can('details.labEquipo.edit')
                                        <td width="10px">
                                            <a class="btn btn-outline-info"
                                               href="{{ route('details.labEquipo.edit', $labEquipo) }}"
                                               role="button">Actualizacion</a>
                                        </td>
                                    @endcan
                                    @can('details.labEquipo.destroy')
                                        <td width="10px">
                                            <a class="btn btn-outline-danger" data-toggle="modal"
                                               data-target="#ModalDelete{{ $labEquipo->id }}">
                                                Eliminar</a>
                                        </td>
                                        @include('details.labsEquipo.modal.delete')
                                    @endcan
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
@endcan

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
