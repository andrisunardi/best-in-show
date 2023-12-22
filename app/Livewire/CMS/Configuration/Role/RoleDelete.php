<?php

namespace App\Livewire\CMS\Configuration\Role;

use App\Livewire\CMS\Component;
use App\Services\RoleService;
use Spatie\Permission\Models\Role;

class RoleDelete extends Component
{
    public function mount(Role $role)
    {
        (new RoleService())->delete(role: $role);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.role')." - {$role->id} - ".trans('index.deleted'),
        ]);

        return $this->redirect(route('cms.configuration.role.index'), navigate: true);
    }
}
