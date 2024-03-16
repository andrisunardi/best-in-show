<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Models\Slider;
use App\Services\SliderService;

class SliderDelete extends Component
{
    public function mount(Slider $slider)
    {
        (new SliderService())->delete(slider: $slider);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.slider')." - {$slider->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
