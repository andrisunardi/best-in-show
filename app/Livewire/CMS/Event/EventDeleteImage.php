<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Models\Event;
use App\Services\EventService;

class EventDeleteImage extends Component
{
    public function mount(Event $event)
    {
        (new EventService())->deleteImage(event: $event);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.event')." - {$event->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
