<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control"
                   placeholder="Ingrese el numero de Serie del equipo">
        </div>
        @if($equipos->count())
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
                        <th scope="col">Numero de Serie</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Marca del Equipo</th>
                        <th scope="col">Categoria del Equipo</th>
                        @canany(['admin.equipo.edit','admin.equipo.show','admin.equipo.destroy'])
                            <th scope="col" colspan="3">Opciones</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($equipos as $equipo)
                        <tr>
                            <td width="10px">{{ $equipo->No_Serie }}</td>
                            <td width="280px">{{ $equipo->descripcion }}</td>
                            <td>{{ $equipo->estatus }}</td>
                            <td>{{ $equipo->marca }}</td>
                            <td>{{ $equipo->tipoEquipo}}</td>
                            @can('admin.equipo.edit')
                                <td width="10px">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.equipo.edit', $equipo->No_Serie) }}"
                                       role="button">Actualizacion</a>
                                </td>
                            @endcan
                            @can('admin.equipo.show')
                                <td width="10px">
                                    <a class="btn btn-outline-warning"
                                       href="{{ route('admin.equipo.show', $equipo->No_Serie) }}"
                                       role="button">Detalles</a>
                                </td>
                            @endcan
                            @can('admin.equipo.destroy')
                                <td width="10px">
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                       data-target="#ModalDelete{{ $equipo->No_Serie }}">
                                        Eliminar</a>
                                </td>
                                @include('admin.Equipos.modal.delete')
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $equipos->links() }}

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
