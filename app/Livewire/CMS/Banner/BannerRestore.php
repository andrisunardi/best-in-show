<?php

namespace App\Livewire\CMS\Banner;

use App\Livewire\CMS\Component;
use App\Models\Banner;
use App\Services\BannerService;

class BannerRestore extends Component
{
    public function mount($banner)
    {
        $banner = Banner::onlyTrashed()->findOrFail($banner);

        (new BannerService())->restore(banner: $banner);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.banner')." - {$banner->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
