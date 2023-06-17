@extends('adminlte::page')

@section('title', 'Listado de componentes')

@section('content_header')
    <a class="btn btn-outline-success float-right" href="{{ route('details.equipoComp.create', $equipo) }}"
       role="button">Agregar</a>
    <h1>Listado de componentes instalados en el equipo: {{ $equipo }}</h1>
@stop

@section('content')
    <div class="card">
        @if($equipoComps->count())
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
                        <th scope="col">Numero de Serie del equipo</th>
                        <th scope="col">Id del Componente</th>
                        <th scope="col">Fecha de Instalacion</th>
                        <th scope="col">Fecha de Desinstalacion</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $cont = 1; ?>
                    @foreach ($equipoComps as $equipoComp)
                        <tr>
                            <th scope="row"><?php echo $cont; $cont++ ?></th>
                            <td>{{ $equipoComp->No_Serie }}</td>
                            <td>{{ $equipoComp->Componente_id }}</td>
                            <td>{{ $equipoComp->fecha_Instalacion }}</td>
                            <td>{{ $equipoComp->fecha_Desnstalacion }}</td>
                            <td>{{ $equipoComp->motivo }}</td>
                            <td width="10px">
                                <a class="btn btn-outline-info"
                                   href="{{ route('details.equipoComp.edit',$equipoComp) }}"
                                   role="button">Actualizacion</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-outline-danger" data-toggle="modal"
                                   data-target="#ModalDelete{{ $equipoComp->id }}">
                                    Eliminar</a>
                            </td>
                            @include('details.equipoComp.modal.delete')
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

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
