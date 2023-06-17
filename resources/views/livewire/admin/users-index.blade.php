<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control"
                   placeholder="Ingrese el nombre o correo electronico de un usuario">
        </div>
        @if($users->count())
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
                        <th scope="col">Id</th>
                        <th scope="col">Nombre del Usuario</th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col" colspan="2">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td width="150" nowrap>{{ $user->id }}</td>
                            <td width="400">{{ $user->name }}</td>
                            <td width="400">{{ $user->email }}</td>
                            <td width="150px">
                                <a class="btn btn-outline-primary" href="{{ route('profile.perfil.assignRoles', $user->id) }}"
                                   role="button">Asignar Roles</a>
                            </td>
                            <td width="100px">
                                <a class="btn btn-outline-danger" data-toggle="modal"
                                   data-target="#ModalDelete{{ $user->id }}">
                                    Eliminar</a>
                            </td>
                            @include('profile.Perfil.modal.delete')
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
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
