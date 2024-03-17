<?php

namespace App\Livewire\Pet;

use App\Livewire\Component;

class PetSidebar extends Component
{
    public $search = '';

    public $pet;

    public $queryString = [
        'search',
    ];

    public function render()
    {
        return view('livewire.pet.sidebar');
    }
}
