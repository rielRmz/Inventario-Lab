<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class EquiposDetails extends Component
{
    public $no_serie;
    public $selectedState = NULL;

    public function mount($no_serie){
        $this->no_serie = $no_serie;
    }

    public function render()
    {
        return view('livewire.admin.equipos-details');
    }
}
