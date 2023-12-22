<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\CMS\Component;
use App\Services\SettingService;

class SettingAddPage extends Component
{
    public $key;

    public $value;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'key',
            'value',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'key' => 'required|string|max:100|unique:settings,key',
            'value' => 'required|string|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $setting = (new SettingService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.setting')." - {$setting->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.configuration.setting.index');
    }

    public function render()
    {
        return view('livewire.cms.configuration.setting.add');
    }
}
