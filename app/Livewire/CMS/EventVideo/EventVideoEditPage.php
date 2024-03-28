<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Models\EventVideo;
use App\Services\EventService;
use App\Services\EventVideoService;

class EventVideoEditPage extends Component
{
    public $eventVideo;

    public $event_id;

    public $video;

    public $video_mobile;

    public $is_active = true;

    public function mount(EventVideo $eventVideo)
    {
        $this->event_id = $eventVideo->event_id;
        $this->is_active = $eventVideo->is_active;
    }

    public function resetFields()
    {
        $this->event_id = $this->eventVideo->event_id;
        $this->is_active = $this->eventVideo->is_active;
    }

    public function rules()
    {
        return [
            'event_id' => 'required|integer|exists:events,id',
            'video' => 'nullable|max:'.env('MAX_VIDEO').'|mimes:'.env('MIMES_VIDEO'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $eventVideo = (new EventVideoService())->edit(eventVideo: $this->eventVideo, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.event_video')." - {$eventVideo->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.event-video.index');
    }

    public function getEvents()
    {
        return (new EventService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.event-video.edit', [
            'events' => $this->getEvents(),
        ]);
    }
}
