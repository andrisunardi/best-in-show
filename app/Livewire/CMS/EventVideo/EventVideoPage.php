<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Services\EventService;
use App\Services\EventVideoService;

class EventVideoPage extends Component
{
    public $event_id = '';

    public $is_active = [];

    public $queryString = [
        'event_id',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'event_id',
            'is_active',
        ]);
    }

    public function getEvents()
    {
        return (new EventService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function getEventVideos()
    {
        return (new EventVideoService())->index(
            event_id: $this->event_id,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.event-video.index', [
            'events' => $this->getEvents(),
            'eventVideos' => $this->getEventVideos(),
        ]);
    }
}
