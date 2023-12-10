<?php

namespace App\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $lng,$lat;

    public function render()
    {
        return view('livewire.map');
    }
}
