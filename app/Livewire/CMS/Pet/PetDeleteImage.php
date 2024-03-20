<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Models\Pet;
use App\Services\PetService;

class PetDeleteImage extends Component
{
    public function mount(Pet $pet)
    {
        (new PetService())->deleteImage(pet: $pet);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.pet')." - {$pet->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
