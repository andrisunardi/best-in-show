<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Models\Slider;

class SliderViewPage extends Component
{
    public $slider;

    public function mount($slider)
    {
        $this->slider = Slider::withTrashed()->findOrFail($slider);
    }

    public function render()
    {
        return view('livewire.cms.slider.view');
    }
}
