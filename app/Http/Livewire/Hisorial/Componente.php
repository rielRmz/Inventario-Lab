<?php

namespace App\Http\Livewire\Hisorial;

use App\Models\Equipo;
use App\Models\EquipoComponente;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Componente extends Component
{
    public function render()
    {
        $equipoComps = Equipo::select('ehc.*','equipos.*','em.descripcion AS marca','es.descripcion AS estatus','te.tipoEquipo','u.name','c.descripcion AS desc'
            ,'tc.tipoComponente','cm.descripcion AS brand','cs.descripcion AS status')
            ->join('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->join('marcas AS em', 'equipos.marca_id', '=', 'em.id')
            ->join('estatus AS es', 'equipos.estatus_id', '=', 'es.id')
            ->join('equipo_has_componentes AS ehc', 'equipos.No_Serie', '=', 'ehc.No_Serie')
            ->join('users AS u', 'ehc.Usuario_id', '=', 'u.id')
            ->join('componentes AS c', 'ehc.Componente_id', '=', 'c.No_Serie')
            ->join('tipo_componentes AS tc', 'c.tipoComponente_id', '=', 'tc.tipoComponente_id')
            ->join('marcas AS cm', 'c.marca_id', '=', 'cm.id')
            ->join('estatus AS cs', 'c.estatus_id', '=', 'cs.id')
            ->get();

        return view('livewire.hisorial.componente', compact('equipoComps'));
    }
}
