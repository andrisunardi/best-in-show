<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Services\EventService;

class EventPage extends Component
{
    public $name = '';

    public $name_idn = '';

    public $description = '';

    public $description_idn = '';

    public $date = '';

    public $location = '';

    public $is_active = [];

    public $queryString = [
        'name',
        'name_idn',
        'description',
        'description_idn',
        'date',
        'location',
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
            'name',
            'name_idn',
            'description',
            'description_idn',
            'date',
            'location',
            'is_active',
        ]);
    }

    public function getEvents()
    {
        return (new EventService())->index(
            name: $this->name,
            name_idn: $this->name_idn,
            description: $this->description,
            description_idn: $this->description_idn,
            date: $this->date,
            location: $this->location,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.event.index', [
            'events' => $this->getEvents(),
        ]);
    }
}
