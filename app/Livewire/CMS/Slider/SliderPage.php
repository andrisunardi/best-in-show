<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\CMS\Component;
use App\Services\SliderService;

class SliderPage extends Component
{
    public $is_active = [];

    public $queryString = [
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'is_active',
        ]);
    }

    public function getSliders()
    {
        return (new SliderService())->index(
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.slider.index', [
            'sliders' => $this->getSliders(),
        ]);
    }
}
