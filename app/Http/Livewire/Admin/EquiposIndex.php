<?php

namespace App\Http\Livewire\Admin;

use App\Models\Equipo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EquiposIndex extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //
        $equipos = Equipo::select('equipos.*', 'm.descripcion AS marca', 's.descripcion AS estatus', 'te.tipoEquipo')
            ->join('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->join('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->join('estatus AS s', 'equipos.estatus_id', '=', 's.id')
            ->where('No_Serie', 'LIKE', '%' . $this->search . '%')
            ->orwhere('m.descripcion', 'LIKE', '%' . $this->search . '%')
            ->orwhere('s.descripcion', 'LIKE', '%' . $this->search . '%')
            ->orderby('created_at','asc')
            ->paginate(10);

        return view('livewire.admin.equipos-index', compact('equipos'));
    }
}
