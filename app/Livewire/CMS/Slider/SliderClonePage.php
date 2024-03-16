<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Models\Slider;
use App\Services\SliderService;

class SliderClonePage extends Component
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
        $slider = (new SliderService())->clone(data: $this->validate(), slider: $this->slider);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.slider')." - {$slider->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.slider.index');
    }

    public function render()
    {
        return view('livewire.cms.slider.clone');
    }
}
