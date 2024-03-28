<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Models\EventImage;
use App\Services\EventImageService;
use Illuminate\Support\Str;

class EventImageDeletePermanent extends Component
{
    public function mount($eventImage)
    {
        $eventImage = EventImage::onlyTrashed()->findOrFail($eventImage);

        (new EventImageService())->deletePermanent(eventImage: $eventImage);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.event_image')." - {$eventImage->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.event-image.trash');
        }

        return redirect()->route('cms.event-image.index');
    }
}
