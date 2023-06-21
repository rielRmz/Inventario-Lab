<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Laboratorio;
use App\Models\Marca;
use Livewire\Component;

class Index extends Component
{
    public $report = NULL;

    public function render()
    {
        $marcas = Marca::all();
        $labs = Laboratorio::all();

        return view('livewire.reportes.index',compact('marcas','labs'));
    }
}
