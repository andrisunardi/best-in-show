<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Models\Slider;
use App\Services\SliderService;
use Illuminate\Support\Str;

class SliderDeletePermanent extends Component
{
    public function mount($slider)
    {
        $slider = Slider::onlyTrashed()->findOrFail($slider);

        (new SliderService())->deletePermanent(slider: $slider);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.slider')." - {$slider->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.slider.trash');
        }

        return redirect()->route('cms.slider.index');
    }
}
