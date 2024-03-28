<?php

namespace App\Livewire\CMS\EventVideo;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\EventVideo;
use App\Services\EventVideoService;

class EventVideoActive extends Component
{
    public function mount(EventVideo $eventVideo)
    {
        (new EventVideoService())->active(eventVideo: $eventVideo);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.event_video')." - {$eventVideo->id} - ".Utils::translate(Utils::active($eventVideo->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
