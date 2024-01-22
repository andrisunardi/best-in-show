<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Models\DisplayContest;
use App\Services\DisplayContestService;

class DisplayContestClonePage extends Component
{
    public $setting;

    public $key;

    public $value;

    public $is_active = true;

    public function mount(DisplayContest $setting)
    {
        $this->key = "{$setting->key} (Copy)";
        $this->value = $setting->value;
        $this->is_active = $setting->is_active;
    }

    public function resetFields()
    {
        $this->key = "{$this->setting->key} (Copy)";
        $this->value = $this->setting->value;
        $this->is_active = $this->setting->is_active;
    }

    public function rules()
    {
        return [
            'key' => 'required|string|max:50|unique:settings,key',
            'value' => 'required|string|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $setting = (new DisplayContestService())->clone(data: $this->validate(), setting: $this->setting);

        $this->flash(
            'success',
            trans('index.setting')." - {$setting->id} - ".trans('index.cloned'),
        );

        return redirect()->route('cms.configuration.setting.index');
    }

    public function render()
    {
        return view('livewire.cms.configuration.setting.clone');
    }
}
