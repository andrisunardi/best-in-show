<?php

namespace App\Livewire\CMS\Pet;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Pet;
use App\Services\PetService;

class PetActive extends Component
{
    public function mount(Pet $pet)
    {
        (new PetService())->active(pet: $pet);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.pet')." - {$pet->id} - ".Utils::translate(Utils::active($pet->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
