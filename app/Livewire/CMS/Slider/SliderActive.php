<?php

namespace App\Livewire\CMS\Slider;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Slider;
use App\Services\SliderService;

class SliderActive extends Component
{
    public function mount(Slider $slider)
    {
        (new SliderService())->active(slider: $slider);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.slider')." - {$slider->id} - ".Utils::translate(Utils::active($slider->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
