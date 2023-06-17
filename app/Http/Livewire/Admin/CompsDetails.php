<?php

namespace App\Http\Livewire\Admin;

use App\Models\EquipoComponente;
use Livewire\Component;

class CompsDetails extends Component
{
    public $no_serie;

    public function mount($no_serie)
    {
        $this->no_serie = $no_serie;
    }

    public function render()
    {
        $equipoComps = EquipoComponente::select("*")
            ->where("No_Serie", "=", $this->no_serie)
            ->get();

        return view('livewire.admin.comps-details', compact('equipoComps'));
    }
}
