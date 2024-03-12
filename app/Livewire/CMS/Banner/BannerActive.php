<?php

namespace App\Livewire\CMS\Banner;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Banner;
use App\Services\BannerService;

class BannerActive extends Component
{
    public function mount(Banner $banner)
    {
        (new BannerService())->active(banner: $banner);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.banner')." - {$banner->id} - ".Utils::translate(Utils::active($banner->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
