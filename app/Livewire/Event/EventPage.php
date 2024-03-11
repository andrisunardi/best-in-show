<?php

namespace App\Livewire\Event;

use App\Models\Event;
use App\Livewire\Component;

class EventPage extends Component
{
    public function getEvents()
    {
        return Event::latest()->active()->get();
    }

    public function render()
    {
        return view('livewire.event.index', [
            'events' => $this->getEvents(),
        ]);
    }
}
