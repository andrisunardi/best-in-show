<?php

namespace App\Http\Livewire\CMS\Configuration\Role;

use App\Http\Livewire\CMS\Component;
use Spatie\Permission\Models\Role;

class RoleViewPage extends Component
{
    public $role;

    public function mount(Role $role)
    {
    }

    public function render()
    {
        return view('livewire.cms.configuration.role.view')
            ->extends('layouts.cms.app')
            ->section('content');
    }
}
