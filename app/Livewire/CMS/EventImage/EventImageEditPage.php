<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Models\EventImage;
use App\Services\EventImageService;
use App\Services\PetService;

class EventImageEditPage extends Component
{
    public $eventImage;

    public $pet_id;

    public $link;

    public $image;

    public $image_mobile;

    public $is_active = true;

    public function mount(EventImage $eventImage)
    {
        $this->pet_id = $eventImage->pet_id;
        $this->link = $eventImage->link;
        $this->is_active = $eventImage->is_active;
    }

    public function resetFields()
    {
        $this->pet_id = $this->eventImage->pet_id;
        $this->link = $this->eventImage->link;
        $this->is_active = $this->eventImage->is_active;
    }

    public function rules()
    {
        return [
            'pet_id' => 'required|integer|exists:pets,id',
            'link' => 'nullable|string|max:100',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $eventImage = (new EventImageService())->edit(eventImage: $this->eventImage, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.eventImage')." - {$eventImage->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.eventImage.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.eventImage.edit', [
            'pets' => $this->getPets(),
        ]);
    }
}
