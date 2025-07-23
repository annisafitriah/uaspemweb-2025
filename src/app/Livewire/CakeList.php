<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cake;

class CakeList extends Component
{
    public $cakes;

    public function mount()
    {
        $this->cakes = Cake::all();
    }

    public function render()
    {
        return view('livewire.cake-list');
    }
}
