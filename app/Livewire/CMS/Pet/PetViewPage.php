<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Models\Pet;

class PetViewPage extends Component
{
    public $pet;

    public function mount($pet)
    {
        $this->pet = Pet::withTrashed()->findOrFail($pet);
    }

    public function render()
    {
        return view('livewire.cms.pet.view');
    }
}
