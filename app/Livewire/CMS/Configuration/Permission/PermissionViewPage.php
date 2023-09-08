<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Livewire\CMS\Component;
use Spatie\Permission\Models\Permission;

class PermissionViewPage extends Component
{
    public $permission;

    public function mount(Permission $permission)
    {
    }

    public function render()
    {
        return view('livewire.cms.configuration.permission.view');
    }
}
