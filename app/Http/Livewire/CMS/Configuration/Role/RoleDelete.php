<?php

namespace App\Http\Livewire\CMS\Configuration\Role;

use App\Http\Livewire\CMS\Component;
use App\Services\RoleService;
use Spatie\Permission\Models\Role;

class RoleDelete extends Component
{
    public function mount(Role $role)
    {
        (new RoleService())->delete(role: $role);

        $this->flash(
            'success',
            trans('index.role')." - {$role->id} - ".trans('index.deleted'),
        );

        return redirect()->route('cms.configuration.role.index');
    }
}
