<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\CMS\Component;
use App\Services\SettingService;

class SettingDeletePermanentAll extends Component
{
    public function mount()
    {
        (new SettingService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.setting').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.configuration.setting.trash');
    }
}
