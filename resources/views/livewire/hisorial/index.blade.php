<div>
    <div class="card">
        <div class="card-header">
            <select wire:model="category" class="form-control">
                <option value="" selected>Elije</option>
                <option value="1">Componentes instalados en el equipo</option>
                <option value="2">Software instalados en el equipo</option>
                <option value="3">Laboratorios en los que se instaló el equipo</option>
            </select>
        </div>
        <div class="card-body">
            @switch($category)
                @case(1)
                    <livewire:hisorial.componente/>
                    @break;
                @case(2)
                    <livewire:hisorial.software />
                    @break;
                @case(3)
                    <livewire:hisorial.laboratorio/>
                    @break;
                @default
                    <strong>
                        No hay registros
                    </strong>
            @endswitch
        </div>
    </div>
</div>
