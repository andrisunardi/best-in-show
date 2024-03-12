<?php

namespace App\Livewire\CMS\Banner;

use App\Livewire\CMS\Component;
use App\Models\Banner;
use App\Services\BannerService;
use Illuminate\Support\Str;

class BannerDeletePermanent extends Component
{
    public function mount($banner)
    {
        $banner = Banner::onlyTrashed()->findOrFail($banner);

        (new BannerService())->deletePermanent(banner: $banner);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.banner')." - {$banner->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.banner.trash');
        }

        return redirect()->route('cms.banner.index');
    }
}
