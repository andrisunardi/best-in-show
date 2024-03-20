<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Models\EventImage;
use App\Services\EventImageService;

class EventImageRestore extends Component
{
    public function mount($eventImage)
    {
        $eventImage = EventImage::onlyTrashed()->findOrFail($eventImage);

        (new EventImageService())->restore(eventImage: $eventImage);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.eventImage')." - {$eventImage->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
