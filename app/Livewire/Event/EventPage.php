<?php

namespace App\Livewire\Event;

use App\Livewire\Component;
use App\Models\Event;

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
