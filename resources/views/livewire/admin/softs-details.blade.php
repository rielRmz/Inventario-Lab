@can('details.equipoSoft.index')
    <div>
        <div class="card">
            <div class="card-header">
                @can('details.equipoSoft.create')
                    <a class="btn btn-outline-success float-right"
                       href="{{ route('details.equipoSoft.create', $no_serie) }}" role="button">Agregar</a>
                @endcan
                <h4 class="float-left">Listado de software instalados en el equipo: {{ $no_serie }}</h4>
            </div>

            @if($equipoSofts->count())
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>

                        <tr>
                            <th scope="col">No de Serie del equipo</th>
                            <th scope="col">Id del Software instaladao</th>
                            <th scope="col">Fecha de Instalacion</th>
                            <th scope="col">Fecha de Desinstalacion</th>
                            <th scope="col">Motivo</th>
                            @canany(['details.equipoSoft.edit','details.equipoSoft.destroy'])
                                <th scope="col" colspan="2">Opciones</th>
                            @endcanany
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($equipoSofts as $equipoSoft)
                            <tr>
                                <td>{{ $equipoSoft->No_Serie }}</td>
                                <td>{{ $equipoSoft->Software_id }}</td>
                                <td>{{ $equipoSoft->fecha_Instalacion }}</td>
                                <td>{{ $equipoSoft->fecha_Desnstalacion }}</td>
                                <td>{{ $equipoSoft->motivo }}</td>
                                @can('details.equipoSoft.edit')
                                    <td width="10px">
                                        <a class="btn btn-outline-primary"
                                           href="{{ route('details.equipoSoft.edit',$equipoSoft)}}" role="button">Actualizacion</a>
                                    </td>
                                @endcan
                                @can('details.equipoSoft.destroy')
                                    <td width="10px">
                                        <a class="btn btn-outline-danger" data-toggle="modal"
                                           data-target="#ModalDelete{{ $equipoSoft->id }}">Eliminar</a>
                                    </td>
                                    @include('details.equipoSoft.modal.delete')
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
    </div>
@endcan
