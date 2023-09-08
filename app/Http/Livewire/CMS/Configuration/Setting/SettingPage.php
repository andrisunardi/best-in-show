<?php

namespace App\Http\Livewire\CMS\Configuration\Setting;

use App\Http\Livewire\CMS\Component;
use App\Services\SettingService;

class SettingPage extends Component
{
    public $key = '';

    public $value = '';

    public $is_active = [];

    public $queryString = [
        'key' => ['except' => ''],
        'value' => ['except' => ''],
        'is_active' => ['except' => []],
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'key',
            'value',
            'is_active',
        ]);
    }

    public function getSettings()
    {
        return (new SettingService())->index(
            key: $this->key,
            value: $this->value,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.configuration.setting.index', [
            'settings' => $this->getSettings(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
