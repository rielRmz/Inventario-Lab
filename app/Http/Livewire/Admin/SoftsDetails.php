<?php

namespace App\Http\Livewire\Admin;

use App\Models\EquipoSoftware;
use Livewire\Component;

class SoftsDetails extends Component
{
    public $no_serie;
    public function mount($no_serie){
        $this->no_serie = $no_serie;
    }

    public function render()
    {
        $equipoSofts = EquipoSoftware::select("*")
            ->where("No_Serie", "=", $this->no_serie)
            ->get();

        return view('livewire.admin.softs-details', compact('equipoSofts'));
    }
}
