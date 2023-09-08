<?php

namespace App\Http\Livewire\CMS\Configuration\Setting;

use App\Http\Livewire\CMS\Component;
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
        return view('livewire.cms.configuration.setting.view')
            ->extends('layouts.cms.app')
            ->section('content');
    }
}
