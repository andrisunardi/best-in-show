<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Services\EventService;
use App\Services\EventVideoService;

class EventVideoAddPage extends Component
{
    public $event_id;

    public $video;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'event_id',
            'video',
            'is_active',
        ]);
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
        $eventVideo = (new EventVideoService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.event_video')." - {$eventVideo->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.event-video.index');
    }

    public function getEvents()
    {
        return (new EventService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.event-video.add', [
            'events' => $this->getEvents(),
        ]);
    }
}
