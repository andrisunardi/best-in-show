<?php

namespace App\Livewire\CMS\Event;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Event;
use App\Services\EventService;

class EventActive extends Component
{
    public function mount(Event $event)
    {
        (new EventService())->active(event: $event);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.event')." - {$event->id} - ".Utils::translate(Utils::active($event->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
