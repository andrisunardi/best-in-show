<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Models\EventVideo;
use App\Services\EventVideoService;

class EventVideoDeleteVideo extends Component
{
    public function mount(EventVideo $eventVideo)
    {
        (new EventVideoService())->deleteVideo(eventVideo: $eventVideo);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.event_video')." - {$eventVideo->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
