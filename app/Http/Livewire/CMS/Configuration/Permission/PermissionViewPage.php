<?php

namespace App\Http\Livewire\CMS\Configuration\Permission;

use App\Http\Livewire\CMS\Component;
use Spatie\Permission\Models\Permission;

class PermissionViewPage extends Component
{
    public $permission;

    public function mount(Permission $permission)
    {
    }

    public function render()
    {
        return view('livewire.cms.configuration.permission.view')
            ->extends('layouts.cms.app')
            ->section('content');
    }
}
