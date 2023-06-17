@extends('layout.plantilla')

@section('title', 'Software')

@section('content')
    <label hidden>{{$No_Serie}}</label>
    <div class="card">
        <div class="card-header">
            <h1>Listado de Softwares</h1>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-stripped">
            <thead>
            <a class="btn btn-success" href="{{ route('equipoSoft.show',$No_Serie)}}" role="button">Agregar</a>
            <tr>
                <th scope="col">Numero de Serie del equipo</th>
                <th scope="col">Id del Software instaladao</th>
                <th scope="col">Fecha de Instalacion</th>
                <th scope="col">Fecha de Desinstalacion</th>
                <th scope="col">Motivo</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($Equiposoft as $Equiposofts)
                <tr>
                    <th>{{ $Equiposofts->No_Serie }}</th>
                    <td>{{ $Equiposofts->Software_id }}</td>
                    <td>{{ $Equiposofts->fecha_Instalacion }}</td>
                    <td>{{ $Equiposofts->fecha_Desnstalacion }}</td>
                    <td>{{ $Equiposofts->motivo }}</td>
                    <td width="10px">
                        <a class="btn btn-info" href="{{ route('equipoSoft.edit',$Equiposofts) }}" role="button">Actualizacion</a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('equipoSoft.destroy',$Equiposofts) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
