<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Services\PetService;
use App\Services\SliderService;

class SliderAddPage extends Component
{
    public $image;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'image',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $slider = (new SliderService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.slider')." - {$slider->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.slider.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.slider.add');
    }
}
