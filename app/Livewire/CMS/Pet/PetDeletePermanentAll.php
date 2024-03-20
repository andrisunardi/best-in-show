<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Services\PetService;

class PetDeletePermanentAll extends Component
{
    public function mount()
    {
        (new PetService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.pet').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.pet.trash');
    }
}
