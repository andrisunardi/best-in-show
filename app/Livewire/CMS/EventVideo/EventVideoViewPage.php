<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Models\EventVideo;

class EventVideoViewPage extends Component
{
    public $eventVideo;

    public function mount($eventVideo)
    {
        $this->eventVideo = EventVideo::withTrashed()->findOrFail($eventVideo);
    }

    public function render()
    {
        return view('livewire.cms.event-video.view');
    }
}
