@extends('adminlte::page')

@section('title', 'Listado de Softwares')

@section('content_header')
    <a class="btn btn-outline-success float-right" href="{{ route('details.equipoSoft.create',$equipo)}}"
       role="button">Agregar</a>
    <h1>Listado de Softwares instalados en el equipo: {{$equipo}}</h1>
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
                    <th scope="col">Id del Software instaladao</th>
                    <th scope="col">Fecha de Instalacion</th>
                    <th scope="col">Fecha de Desinstalacion</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $cont = 1; ?>
                @foreach ($equipoSofts as $equipoSoft)
                    <tr>
                        <th scope="row"><?php echo $cont; $cont++ ?></th>
                        <td>{{ $equipoSoft->No_Serie }}</td>
                        <td>{{ $equipoSoft->Software_id }}</td>
                        <td>{{ $equipoSoft->fecha_Instalacion }}</td>
                        <td>{{ $equipoSoft->fecha_Desnstalacion }}</td>
                        <td>{{ $equipoSoft->motivo }}</td>
                        <td width="10px">
                            <a class="btn btn-outline-info" href="{{ route('details.equipoSoft.edit',$equipoSoft)}}"
                               role="button">Actualizacion</a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-outline-danger" data-toggle="modal"
                               data-target="#ModalDelete{{ $equipoSoft->id }}">
                                Eliminar</a>
                        </td>
                        @include('details.equipoSoft.modal.delete')
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
