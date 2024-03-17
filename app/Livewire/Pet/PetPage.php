<?php

namespace App\Livewire\Pet;

use App\Livewire\Component;
use App\Services\PetService;

class PetPage extends Component
{
    public function getPets()
    {
        return (new PetService())->index(orderBy: 'id', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.pet.index', [
            'pets' => $this->getPets(),
        ]);
    }
}
