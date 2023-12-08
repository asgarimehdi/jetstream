<?php

namespace App\Livewire;

use Livewire\Component;

class Map extends Component
{
    public string $center='[36.1474388, 49.2286013]';

    public  $latitud='';
    public array $markers=['','[36.1474388, 49.2286013]','[37.1474388, 49.2286013]','[35.1474388, 48.2286013]'];
    public function render()
    {

        return view('livewire.map');
    }
}
