<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Models\Event;

class EventViewPage extends Component
{
    public $event;

    public function mount($event)
    {
        $this->event = Event::withTrashed()->findOrFail($event);
    }

    public function render()
    {
        return view('livewire.cms.event.view');
    }
}
