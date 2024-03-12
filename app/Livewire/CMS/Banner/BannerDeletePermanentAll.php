<?php

namespace App\Livewire\CMS\Banner;

use App\Livewire\CMS\Component;
use App\Services\BannerService;

class BannerDeletePermanentAll extends Component
{
    public function mount()
    {
        (new BannerService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.banner').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.banner.trash');
    }
}
