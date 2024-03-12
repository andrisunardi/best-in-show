<?php

namespace App\Livewire\CMS\Banner;

use App\Livewire\CMS\Component;
use App\Services\BannerService;

class BannerRestoreAll extends Component
{
    public function mount()
    {
        (new BannerService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.banner').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.banner.trash');
    }
}
