<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Models\EventImage;

class EventImageViewPage extends Component
{
    public $eventImage;

    public function mount($eventImage)
    {
        $this->eventImage = EventImage::withTrashed()->findOrFail($eventImage);
    }

    public function render()
    {
        return view('livewire.cms.eventImage.view');
    }
}
