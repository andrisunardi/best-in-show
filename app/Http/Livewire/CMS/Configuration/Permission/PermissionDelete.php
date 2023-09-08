<?php

namespace App\Http\Livewire\CMS\Configuration\Permission;

use App\Http\Livewire\CMS\Component;
use App\Services\PermissionService;
use Spatie\Permission\Models\Permission;

class PermissionDelete extends Component
{
    public function mount(Permission $permission)
    {
        (new PermissionService())->delete(permission: $permission);

        $this->flash(
            'success',
            trans('index.permission')." - {$permission->id} - ".trans('index.deleted'),
        );

        return redirect()->route('cms.configuration.permission.index');
    }
}
