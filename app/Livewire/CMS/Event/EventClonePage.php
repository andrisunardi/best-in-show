<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Models\Event;
use App\Services\EventService;

class EventClonePage extends Component
{
    public $event;

    public $name;

    public $name_idn;

    public $description;

    public $description_idn;

    public $date;

    public $location;

    public $image;

    public $video;

    public $is_active = true;

    public function mount(Event $event)
    {
        $this->name = "{$event->name} (Copy)";
        $this->name_idn = "{$event->name_idn} (Copy)";
        $this->description = $event->description;
        $this->description_idn = $event->description_idn;
        $this->date = $event->date?->format('Y-m-d');
        $this->location = $event->location;
        $this->is_active = $event->is_active;
    }

    public function resetFields()
    {
        $this->name = "{$this->event->name} (Copy)";
        $this->name_idn = "{$this->event->name_idn} (Copy)";
        $this->description = $this->event->description;
        $this->description_idn = $this->event->description_idn;
        $this->date = $this->event->date?->format('Y-m-d');
        $this->location = $this->event->location;
        $this->is_active = $this->event->is_active;
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
        $event = (new EventService())->clone(data: $this->validate(), event: $this->event);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.event')." - {$event->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.event.index');
    }

    public function render()
    {
        return view('livewire.cms.event.clone');
    }
}
