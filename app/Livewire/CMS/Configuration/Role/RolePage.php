<?php

namespace App\Livewire\CMS\Configuration\Role;

use App\Livewire\CMS\Component;
use App\Services\PermissionService;
use App\Services\RoleService;

class RolePage extends Component
{
    public $permission_id = '';

    public $name = '';

    public $guard_name = '';

    public $queryString = [
        'permission_id',
        'name',
        'guard_name',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'permission_id',
            'name',
            'guard_name',
        ]);
    }

    public function getPermissions()
    {
        return (new PermissionService())->index();
    }

    public function getRoles()
    {
        return (new RoleService())->index(
            permission_id: $this->permission_id,
            name: $this->name,
            guard_name: $this->guard_name,
        );
    }

    public function render()
    {
        return view('livewire.cms.configuration.role.index', [
            'roles' => $this->getRoles(),
            'permissions' => $this->getPermissions(),
        ]);
    }
}
