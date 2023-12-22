<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\CMS\Component;
use App\Services\SettingService;

class SettingRestoreAll extends Component
{
    public function mount()
    {
        (new SettingService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.setting').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.configuration.setting.trash');
    }
}
