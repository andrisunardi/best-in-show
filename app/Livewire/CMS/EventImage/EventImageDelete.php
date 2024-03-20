<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Models\EventImage;
use App\Services\EventImageService;

class EventImageDelete extends Component
{
    public function mount(EventImage $eventImage)
    {
        (new EventImageService())->delete(eventImage: $eventImage);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.eventImage')." - {$eventImage->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
