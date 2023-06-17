<?php

namespace App\Http\Livewire\Reportes;

use Livewire\Component;

class Index extends Component
{
    public $report = NULL;

    public function render()
    {
        return view('livewire.reportes.index');
    }
}
