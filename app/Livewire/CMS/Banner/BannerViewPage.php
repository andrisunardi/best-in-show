<?php

namespace App\Livewire\CMS\Banner;

use App\Livewire\CMS\Component;
use App\Models\Banner;

class BannerViewPage extends Component
{
    public $banner;

    public function mount($banner)
    {
        $this->banner = Banner::withTrashed()->findOrFail($banner);
    }

    public function render()
    {
        return view('livewire.cms.banner.view');
    }
}
