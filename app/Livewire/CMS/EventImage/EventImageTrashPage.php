<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Services\EventImageService;
use App\Services\EventService;

class EventImageTrashPage extends Component
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

    public function getEventImages()
    {
        return (new EventImageService())->index(
            event_id: $this->event_id,
            is_active: $this->is_active,
            trash: true,
        );
    }

    public function render()
    {
        return view('livewire.cms.event-image.trash', [
            'events' => $this->getEvents(),
            'eventImages' => $this->getEventImages(),
        ]);
    }
}
