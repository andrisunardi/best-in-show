<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\CMS\Component;
use App\Models\Setting;
use App\Services\SettingService;

class SettingEditPage extends Component
{
    public $setting;

    public $key;

    public $value;

    public $is_active = true;

    public function mount(Setting $setting)
    {
        $this->key = $setting->key;
        $this->value = $setting->value;
        $this->is_active = $setting->is_active;
    }

    public function resetFields()
    {
        $this->key = $this->setting->key;
        $this->value = $this->setting->value;
        $this->is_active = $this->setting->is_active;
    }

    public function rules()
    {
        return [
            'key' => "required|string|max:50|unique:settings,key,{$this->setting->id}",
            'value' => 'required|string|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $setting = (new SettingService())->edit(setting: $this->setting, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.setting')." - {$setting->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.configuration.setting.index');
    }

    public function render()
    {
        return view('livewire.cms.configuration.setting.edit');
    }
}
