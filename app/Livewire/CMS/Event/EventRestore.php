<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Models\Event;
use App\Services\EventService;

class EventRestore extends Component
{
    public function mount($event)
    {
        $event = Event::onlyTrashed()->findOrFail($event);

        (new EventService())->restore(event: $event);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.event')." - {$event->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
