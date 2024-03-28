<?php

namespace App\Livewire\CMS\EventImage;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\EventImage;
use App\Services\EventImageService;

class EventImageActive extends Component
{
    public function mount(EventImage $eventImage)
    {
        (new EventImageService())->active(eventImage: $eventImage);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.event_image')." - {$eventImage->id} - ".Utils::translate(Utils::active($eventImage->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
