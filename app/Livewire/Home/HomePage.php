<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Models\Event;
use App\Models\Promotion;
use App\Services\PetService;

class HomePage extends Component
{
    public function getPets()
    {
        return (new PetService())->index(orderBy: 'id', sortBy: 'asc', paginate: false);
    }

    public function getLatestEvent()
    {
        return Event::latest()->first();
    }

    public function getLatestPromotion()
    {
        return Promotion::latest()->first();
    }

    public function getEvents()
    {
        return Event::active()->get();
    }

    public function render()
    {
        return view('livewire.home.index', [
            'pets' => $this->getPets(),
            'latestEvent' => $this->getLatestEvent(),
            'latestPromotion' => $this->getLatestPromotion(),
            'events' => $this->getEvents(),
        ]);
    }
}
