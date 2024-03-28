<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Services\EventImageService;
use App\Services\EventService;

class EventImageAddPage extends Component
{
    public $event_id;

    public $image;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'event_id',
            'image',
            'is_active',
        ]);
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
        $eventImage = (new EventImageService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.event_image')." - {$eventImage->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.event-image.index');
    }

    public function getEvents()
    {
        return (new EventService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.event-image.add', [
            'events' => $this->getEvents(),
        ]);
    }
}
