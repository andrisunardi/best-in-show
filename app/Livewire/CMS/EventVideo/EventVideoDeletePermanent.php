<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Models\EventVideo;
use App\Services\EventVideoService;
use Illuminate\Support\Str;

class EventVideoDeletePermanent extends Component
{
    public function mount($eventVideo)
    {
        $eventVideo = EventVideo::onlyTrashed()->findOrFail($eventVideo);

        (new EventVideoService())->deletePermanent(eventVideo: $eventVideo);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.event_video')." - {$eventVideo->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.event-video.trash');
        }

        return redirect()->route('cms.event-video.index');
    }
}
