<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Support\Str;

class EventDeletePermanent extends Component
{
    public function mount($event)
    {
        $event = Event::onlyTrashed()->findOrFail($event);

        (new EventService())->deletePermanent(event: $event);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.event')." - {$event->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.event.trash');
        }

        return redirect()->route('cms.event.index');
    }
}
