@extends('adminlte::page')

@section('title', 'Listado de laboratorios')

@section('content_header')
    <a class="btn btn-outline-success float-right" href="{{ route('details.equipoLab.create', $equipo) }}"
       role="button">Agregar</a>
    <h1>Listado de laboratorios en los que se instalo el equipo: {{ $equipo }}</h1>
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
                    <th scope="col">Num renglon</th>
                    <th scope="col">No de Serie del equipo</th>
                    <th scope="col">laboratorio</th>
                    <th scope="col">Fecha de Instalacion</th>
                    <th scope="col">Fecha de Desinstalacion</th>
                    <th scope="col">Identificador del equipo</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $cont = 1; ?>
                @foreach ($equipoLabs as $equipoLab)
                    <tr>
                        <th scope="row"><?php echo $cont; $cont++ ?></th>
                        <td>{{ $equipoLab->No_Serie }}</td>
                        <td>{{ $equipoLab->id_laboratorio }}</td>
                        <td>{{ $equipoLab->fecha_Instalacion }}</td>
                        <td>{{ $equipoLab->fecha_Desnstalacion }}</td>
                        <td>{{ $equipoLab->equipoLab_id }}</td>
                        <td width="10px">
                            <a class="btn btn-outline-info" href="{{ route('details.equipoLab.edit',$equipoLab) }}"
                               role="button">Actualizacion</a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-outline-danger" data-toggle="modal"
                               data-target="#ModalDelete{{ $equipoLab->id }}">
                                Eliminar</a>
                        </td>
                        @include('details.equipoLabs.modal.delete')
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
