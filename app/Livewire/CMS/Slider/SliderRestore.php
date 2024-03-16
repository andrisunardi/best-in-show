<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Models\Slider;
use App\Services\SliderService;

class SliderRestore extends Component
{
    public function mount($slider)
    {
        $slider = Slider::onlyTrashed()->findOrFail($slider);

        (new SliderService())->restore(slider: $slider);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.slider')." - {$slider->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
