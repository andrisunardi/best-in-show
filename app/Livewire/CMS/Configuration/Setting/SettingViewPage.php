<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\CMS\Component;
use App\Models\Setting;

class SettingViewPage extends Component
{
    public $setting;

    public function mount($setting)
    {
        $this->setting = Setting::withTrashed()->findOrFail($setting);
    }

    public function render()
    {
        return view('livewire.cms.configuration.setting.view');
    }
}
