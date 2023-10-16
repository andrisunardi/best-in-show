<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\CMS\Component;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Support\Str;

class SettingActive extends Component
{
    public function mount(Setting $setting)
    {
        (new SettingService())->active(setting: $setting);

        $this->flash(
            'success',
            trans('index.setting')." - {$setting->id} - ".Str::translate(Str::active($setting->is_active)),
        );

        return redirect(url()->previous());
    }
}
