<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Services\SliderService;

class SliderRestoreAll extends Component
{
    public function mount()
    {
        (new SliderService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.slider').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.slider.trash');
    }
}
