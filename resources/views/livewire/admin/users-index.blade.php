<div>
    @include('livewire.DeleteUsuario')

    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control"
                placeholder="Ingrese el nombre o correo electronico de un usuario">
        </div>
        @if ($users->count())
            <div class="card-body">
                @if (session()->get('message'))
                    @switch(session()->get('type'))
                        @case('store')
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @break;
                        @case('update')
                            <div class="alert alert-warning" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @break;
                        @case('destroy')
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @break;
                    @endswitch
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre del Usuario</th>
                            <th scope="col">Correo Electrónico</th>
                            @canany(['profile.perfil.assignRoles', 'profile.perfil.destroy'])
                                <th scope="col" colspan="2">Opciones</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td width="150" nowrap>{{ $user->id }}</td>
                                <td width="400">{{ $user->name }}</td>
                                <td width="400">{{ $user->email }}</td>
                                @can('profile.perfil.assignRoles')
                                    <td width="110px">
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('profile.perfil.assignRoles', $user) }}"
                                            role="button">Asignar Roles</a>
                                    </td>
                                @endcan
                                @can('profile.perfil.destroy')
                                    <td width="140px">
                                        <button data-toggle="modal" data-target="#DeleteUsuario"
                                            class="btn btn-outline-danger" wire:click="delete({{ $user }})">Eliminar
                                            Usuario
                                        </button>
                                @endcan
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
