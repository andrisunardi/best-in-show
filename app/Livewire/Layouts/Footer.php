<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use App\Services\PetService;

class Footer extends Component
{
    public function getPets()
    {
        return (new PetService())->index(orderBy: 'id', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.layouts.footer', [
            'pets' => $this->getPets(),
        ]);
    }
}
