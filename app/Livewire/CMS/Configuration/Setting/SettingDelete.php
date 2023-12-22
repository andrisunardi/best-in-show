<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\CMS\Component;
use App\Models\Setting;
use App\Services\SettingService;

class SettingDelete extends Component
{
    public function mount(Setting $setting)
    {
        (new SettingService())->delete(setting: $setting);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.setting')." - {$setting->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
