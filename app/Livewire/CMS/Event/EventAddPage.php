<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Services\EventService;

class EventAddPage extends Component
{
    public $name;

    public $name_idn;

    public $description;

    public $description_idn;

    public $date;

    public $location;

    public $image;

    public $video;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'name',
            'name_idn',
            'description',
            'description_idn',
            'date',
            'location',
            'image',
            'video',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:events,name',
            'name_idn' => 'required|string|max:100|unique:events,name_idn',
            'description' => 'nullable|string|max:65535',
            'description_idn' => 'nullable|string|max:65535',
            'date' => 'nullable|date|date_format:Y-m-d',
            'location' => 'nullable|string|max:100',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'video' => 'nullable|max:'.env('MAX_VIDEO').'|mimes:'.env('MIMES_VIDEO'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $event = (new EventService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.event')." - {$event->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.event.index');
    }

    public function render()
    {
        return view('livewire.cms.event.add');
    }
}
