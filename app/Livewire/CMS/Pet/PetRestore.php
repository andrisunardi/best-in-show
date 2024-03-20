<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Models\Pet;
use App\Services\PetService;

class PetRestore extends Component
{
    public function mount($pet)
    {
        $pet = Pet::onlyTrashed()->findOrFail($pet);

        (new PetService())->restore(pet: $pet);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.pet')." - {$pet->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
