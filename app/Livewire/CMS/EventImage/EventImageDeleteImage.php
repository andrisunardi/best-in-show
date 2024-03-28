<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Models\EventImage;
use App\Services\EventImageService;

class EventImageDeleteImage extends Component
{
    public function mount(EventImage $eventImage)
    {
        (new EventImageService())->deleteImage(eventImage: $eventImage);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.event_image')." - {$eventImage->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
