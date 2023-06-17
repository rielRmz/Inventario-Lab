<?php

namespace App\Http\Livewire\Hisorial;

use Livewire\Component;

class Index extends Component
{
    public $category = NULL;

    public function render()
    {
        return view('livewire.hisorial.index');
    }
}
