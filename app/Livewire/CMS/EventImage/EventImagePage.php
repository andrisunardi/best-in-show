<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Services\EventImageService;
use App\Services\PetService;

class EventImagePage extends Component
{
    public $pet_id = '';

    public $link = '';

    public $is_active = [];

    public $queryString = [
        'pet_id',
        'link',
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
            'pet_id',
            'link',
            'is_active',
        ]);
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function getEventImages()
    {
        return (new EventImageService())->index(
            pet_id: $this->pet_id,
            link: $this->link,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.eventImage.index', [
            'pets' => $this->getPets(),
            'eventImages' => $this->getEventImages(),
        ]);
    }
}
