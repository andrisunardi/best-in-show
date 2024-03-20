<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Services\EventImageService;
use App\Services\PetService;

class EventImageAddPage extends Component
{
    public $pet_id;

    public $link;

    public $image;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'pet_id',
            'link',
            'image',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'pet_id' => 'required|integer|exists:pets,id',
            'link' => 'nullable|active_url|max:100',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $eventImage = (new EventImageService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.eventImage')." - {$eventImage->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.eventImage.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.eventImage.add', [
            'pets' => $this->getPets(),
        ]);
    }
}
