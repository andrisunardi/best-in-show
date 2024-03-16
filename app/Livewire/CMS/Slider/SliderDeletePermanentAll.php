<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Services\SliderService;

class SliderDeletePermanentAll extends Component
{
    public function mount()
    {
        (new SliderService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.slider').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.slider.trash');
    }
}
