<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\EventService;
use App\Services\PetService;

class HomePage extends Component
{
    public function getPets()
    {
        return (new PetService())->index(orderBy: 'id', sortBy: 'asc', paginate: false);
    }

    public function getEvents()
    {
        return (new EventService())->index(orderBy: 'id', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.home.index', [
            'pets' => $this->getPets(),
        ]);
    }
}
