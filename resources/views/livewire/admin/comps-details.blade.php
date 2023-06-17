@can('details.equipoComp.index')
    <div>
        <div class="card">
            <div class="card-header">
                @can('details.equipoComp.create')
                    <a class="btn btn-outline-success float-right"
                       href="{{ route('details.equipoComp.create', $no_serie) }}"
                       role="button">Agregar</a>
                @endcan
                <h4 class="float-left">Listado de componentes instalados en el equipo: {{ $no_serie }}</h4>
            </div>

            @if($equipoComps->count())
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Numero de Serie del equipo</th>
                            <th scope="col">Id del Componente</th>
                            <th scope="col">Fecha de Instalacion</th>
                            <th scope="col">Fecha de Desinstalacion</th>
                            <th scope="col">Motivo</th>
                            @canany(['details.equipoComp.edit','details.equipoComp.destroy'])
                                <th scope="col" colspan="2">Opciones</th>
                            @endcanany
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($equipoComps as $equipoComp)
                            <tr>
                                <td>{{ $equipoComp->No_Serie }}</td>
                                <td>{{ $equipoComp->Componente_id }}</td>
                                <td>{{ $equipoComp->fecha_Instalacion }}</td>
                                <td>{{ $equipoComp->fecha_Desnstalacion }}</td>
                                <td>{{ $equipoComp->motivo }}</td>
                                @can('details.equipoComp.edit')
                                    <td width="10px">
                                        <a class="btn btn-outline-primary"
                                           href="{{ route('details.equipoComp.edit',$equipoComp) }}"
                                           role="button">Actualizacion</a>
                                    </td>
                                @endcan
                                @can('details.equipoComp.destroy')
                                    <td width="10px">
                                        <a class="btn btn-outline-danger" data-toggle="modal"
                                           data-target="#ModalDelete{{ $equipoComp->id }}">
                                            Eliminar</a>
                                    </td>
                                    @include('details.equipoComp.modal.delete')
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
