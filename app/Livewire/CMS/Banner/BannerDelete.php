<?php

namespace App\Livewire\CMS\Banner;

use App\Livewire\CMS\Component;
use App\Models\Banner;
use App\Services\BannerService;

class BannerDelete extends Component
{
    public function mount(Banner $banner)
    {
        (new BannerService())->delete(banner: $banner);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.banner')." - {$banner->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
