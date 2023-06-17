<div>
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Listado de componentes instalados en el equipo</h4>
        </div>

        @if($equipoLabs->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Num renglon</th>
                        <th scope="col">Numero de Serie del equipo</th>
                        <th scope="col">Id del Laboratorio</th>
                        <th scope="col">Fecha de Instalacion</th>
                        <th scope="col">Fecha de Desinstalacion</th>
                        <th scope="col">Responsable</th>
                        <th scope="col" colspan="2">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($equipoLabs as $equipoLab)
                        <tr>
                            <th scope="row">{{ $equipoLab->id }}</th>
                            <td>{{ $equipoLab->No_Serie }}</td>
                            <td>{{ $equipoLab->id_laboratorio }}</td>
                            <td>{{ $equipoLab->fecha_Instalacion }}</td>
                            <td>{{ $equipoLab->fecha_Desnstalacion }}</td>
                            <td>{{ $equipoLab->name }}</td>
                            <td width="10px">
                                <a class="btn btn-outline-danger" data-toggle="modal"
                                   data-target="#ModalDelete{{ $equipoLab->id }}">
                                    Detalles</a>
                            </td>
                            @include('Historial.modal.detailLab')
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
