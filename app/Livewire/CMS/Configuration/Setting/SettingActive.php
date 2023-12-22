<?php

namespace App\Livewire\CMS\Configuration\Setting;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Setting;
use App\Services\SettingService;

class SettingActive extends Component
{
    public function mount(Setting $setting)
    {
        (new SettingService())->active(setting: $setting);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.setting')." - {$setting->id} - ".Utils::translate(Utils::active($setting->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
