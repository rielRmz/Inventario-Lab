@can('admin.equipo.show')
    <div>
        <div class="card">
            <div class="card-header">
                <select wire:model="selectedState" class="form-control">
                    <option value="" selected>Elije</option>
                    @can('details.equipoComp.index')
                        <option value="1">Componentes instalados en el equipo</option>
                    @endcan
                    @can('details.equipoSoft.index')
                        <option value="2">Software instalados en el equipo</option>
                    @endcan
                    @can('details.equipoLab.index')
                        <option value="3">Laboratorios en los que se instaló el equipo</option>
                    @endcan
                </select>
            </div>
            <div class="card-body">
                @switch($selectedState)
                    @case(1)
                        <livewire:admin.comps-details :no_serie="$no_serie"/>
                        @break;
                    @case(2)
                        <livewire:admin.softs-details :no_serie="$no_serie"/>
                        @break;
                    @case(3)
                        <livewire:admin.labs-details :no_serie="$no_serie"/>
                        @break;
                    @default
                        <strong>
                            No hay registros
                        </strong>
                @endswitch
            </div>
        </div>
    </div>
@endcan
