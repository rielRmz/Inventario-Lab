@can('details.equipoLab.index')
    <div>
        <div class="card">
            <div class="card-header">
                @can('details.equipoLab.create')
                    <a class="btn btn-outline-success float-right"
                       href="{{ route('details.equipoLab.create', $no_serie) }}" role="button">Agregar</a>
                @endcan
                <h4>Listado de laboratorios en los que se instalo el equipo: {{ $no_serie }}</h4>
            </div>
            @if($equipoLabs->count())
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">No de Serie del equipo</th>
                            <th scope="col">laboratorio</th>
                            <th scope="col">Fecha de Instalacion</th>
                            <th scope="col">Fecha de Desinstalacion</th>
                            <th scope="col">Identificador del equipo</th>
                            @canany(['details.equipoLab.edit','details.equipoLab.destroy'])
                                <th scope="col" colspan="2">Opciones</th>
                            @endcanany
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($equipoLabs as $equipoLab)
                            <tr>
                                <td>{{ $equipoLab->No_Serie }}</td>
                                <td>{{ $equipoLab->id_laboratorio }}</td>
                                <td>{{ $equipoLab->fecha_Instalacion }}</td>
                                <td>{{ $equipoLab->fecha_Desnstalacion }}</td>
                                <td>{{ $equipoLab->equipoLab_id }}</td>
                                @can('details.equipoLab.edit')
                                    <td width="10px">
                                        <a class="btn btn-outline-primary"
                                           href="{{ route('details.equipoLab.edit',$equipoLab) }}"
                                           role="button">Actualizacion</a>
                                    </td>
                                @endcan
                                @can('details.equipoLab.destroy')
                                    <td width="10px">
                                        <a class="btn btn-outline-danger" data-toggle="modal"
                                           data-target="#ModalDelete{{ $equipoLab->id }}">
                                            Eliminar</a>
                                    </td>
                                    @include('details.equipoLabs.modal.delete')
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
