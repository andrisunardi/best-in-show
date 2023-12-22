<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\CMS\Component;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Support\Str;

class SettingDeletePermanent extends Component
{
    public function mount($setting)
    {
        $setting = Setting::onlyTrashed()->findOrFail($setting);

        (new SettingService())->deletePermanent(setting: $setting);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.setting')." - {$setting->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.configuration.setting.trash');
        }

        return redirect()->route('cms.configuration.setting.index');
    }
}
