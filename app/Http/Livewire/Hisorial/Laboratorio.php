<?php

namespace App\Http\Livewire\Hisorial;

use App\Models\Equipo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Laboratorio extends Component
{
    public function render()
    {
        $equipoLabs = Equipo::select('ehl.*','equipos.*','em.descripcion AS marca','es.descripcion AS estatus','te.tipoEquipo'
            ,'u.name', 'l.*')
            ->join('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->join('marcas AS em', 'equipos.marca_id', '=', 'em.id')
            ->join('estatus AS es', 'equipos.estatus_id', '=', 'es.id')
            ->join('equipo_has_laboratorios AS ehl', 'equipos.No_Serie', '=', 'ehl.No_Serie')
            ->join('laboratorios AS l', 'ehl.id_laboratorio', '=', 'l.id_laboratorio')
            ->join('users AS u', 'ehl.Usuario_id', '=', 'u.id')
            ->get();

        return view('livewire.hisorial.laboratorio', compact('equipoLabs'));
    }
}
