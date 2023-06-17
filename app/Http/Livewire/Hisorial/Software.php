<?php

namespace App\Http\Livewire\Hisorial;

use App\Models\Equipo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Software extends Component
{
    public function render()
    {
        $equipoSofts = Equipo::select('ehs.*','equipos.*','em.descripcion AS marca','es.descripcion AS estatus','te.tipoEquipo'
            ,'u.name','s.descripcion as desc', 'ts.tipoSoftware')
            ->join('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->join('marcas AS em', 'equipos.marca_id', '=', 'em.id')
            ->join('estatus AS es', 'equipos.estatus_id', '=', 'es.id')
            ->join('equipo_has_software AS ehs', 'equipos.No_Serie', '=', 'ehs.No_Serie')
            ->join('software AS s', 'ehs.Software_id',    '=', 's.Software_id')
            ->join('tipo_software AS ts', 'ts.tipoSoftware_id', '=', 's.tipoSoftware_id')
            ->join('users AS u', 'ehs.Usuario_id', '=', 'u.id')
            ->get();

        return view('livewire.hisorial.software', compact('equipoSofts'));
    }
}
