<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Models\Slider;
use App\Services\PetService;
use App\Services\SliderService;

class SliderEditPage extends Component
{
    public $slider;

    public $image;

    public $is_active = true;

    public function mount(Slider $slider)
    {
        $this->is_active = $slider->is_active;
    }

    public function resetFields()
    {
        $this->is_active = $this->slider->is_active;
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
        $slider = (new SliderService())->edit(slider: $this->slider, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.slider')." - {$slider->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.slider.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.slider.edit');
    }
}
