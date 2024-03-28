<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Models\EventImage;
use App\Services\EventImageService;
use App\Services\EventService;

class EventImageEditPage extends Component
{
    public $eventImage;

    public $event_id;

    public $image;

    public $image_mobile;

    public $is_active = true;

    public function mount(EventImage $eventImage)
    {
        $this->event_id = $eventImage->event_id;
        $this->is_active = $eventImage->is_active;
    }

    public function resetFields()
    {
        $this->event_id = $this->eventImage->event_id;
        $this->is_active = $this->eventImage->is_active;
    }

    public function rules()
    {
        return [
            'event_id' => 'required|integer|exists:events,id',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $eventImage = (new EventImageService())->edit(eventImage: $this->eventImage, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.event_image')." - {$eventImage->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.event-image.index');
    }

    public function getEvents()
    {
        return (new EventService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.event-image.edit', [
            'events' => $this->getEvents(),
        ]);
    }
}
