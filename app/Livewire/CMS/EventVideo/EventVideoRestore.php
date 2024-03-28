<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Models\EventVideo;
use App\Services\EventVideoService;

class EventVideoRestore extends Component
{
    public function mount($eventVideo)
    {
        $eventVideo = EventVideo::onlyTrashed()->findOrFail($eventVideo);

        (new EventVideoService())->restore(eventVideo: $eventVideo);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.event_video')." - {$eventVideo->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
