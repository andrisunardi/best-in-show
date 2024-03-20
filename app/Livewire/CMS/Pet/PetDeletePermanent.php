<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Models\Pet;
use App\Services\PetService;
use Illuminate\Support\Str;

class PetDeletePermanent extends Component
{
    public function mount($pet)
    {
        $pet = Pet::onlyTrashed()->findOrFail($pet);

        (new PetService())->deletePermanent(pet: $pet);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.pet')." - {$pet->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.pet.trash');
        }

        return redirect()->route('cms.pet.index');
    }
}
