<?php

namespace App\Livewire\CMS\Layouts;

use App\Livewire\CMS\Component;
use Detection\MobileDetect;

class Sidebar extends Component
{
    public $isMobile;

    public function mount()
    {
        $this->isMobile = $this->isMobile();
    }

    private function isMobile()
    {
        $detect = new MobileDetect();

        return $detect->isMobile() || $detect->isTablet();
    }

    public function render()
    {
        return view('livewire.cms.layouts.sidebar', [
            'menus' => config('menus'),
        ]);
    }
}
