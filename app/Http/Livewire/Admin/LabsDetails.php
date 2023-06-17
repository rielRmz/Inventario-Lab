<?php

namespace App\Http\Livewire\Admin;

use App\Models\EquipoLaboratorio;
use Livewire\Component;

class LabsDetails extends Component
{
    public $no_serie;
    public function mount($no_serie){
        $this->no_serie = $no_serie;
    }

    public function render()
    {
        $equipoLabs = EquipoLaboratorio::select("*")
            ->where("No_Serie", "=", $this->no_serie)
            ->get();

        return view('livewire.admin.labs-details', compact('equipoLabs'));
    }
}
