<?php

namespace App\Livewire\Event;

use App\Livewire\Component;
use App\Models\Event;

class EventViewPage extends Component
{
    public $event;

    public function mount($slug)
    {
        $this->event = Event::where('slug', $slug)->active()->firstOrFail();
    }

    public function getRelatedEvents()
    {
        return Event::where('id', '!=', $this->event->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();
    }

    public function render()
    {
        return view('livewire.event.view', [
            'relatedEvents' => $this->getRelatedEvents(),
        ]);
    }
}
