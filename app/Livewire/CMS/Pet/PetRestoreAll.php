<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Services\PetService;

class PetRestoreAll extends Component
{
    public function mount()
    {
        (new PetService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.pet').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.pet.trash');
    }
}
