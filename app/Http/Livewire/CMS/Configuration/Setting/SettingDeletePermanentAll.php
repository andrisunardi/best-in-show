<?php

namespace App\Http\Livewire\CMS\Configuration\Setting;

use App\Http\Livewire\CMS\Component;
use App\Services\SettingService;

class SettingDeletePermanentAll extends Component
{
    public function mount()
    {
        (new SettingService())->deletePermanentAll();

        $this->flash(
            'success',
            trans('index.all').' - '.trans('index.setting').' - '.trans('index.deleted_permanently'),
        );

        return redirect()->route('cms.configuration.setting.trash');
    }
}
