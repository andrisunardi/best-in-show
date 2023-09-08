<?php

namespace App\Livewire\CMS\Configuration\User;

use App\Livewire\CMS\Component;
use App\Services\PermissionService;
use App\Services\RoleService;
use App\Services\UserService;

class UserTrashPage extends Component
{
    public $name = '';

    public $email = '';

    public $phone = '';

    public $username = '';

    public $is_active = [];

    public $role_id = '';

    public $permission_name = '';

    public $queryString = [
        'name',
        'email',
        'phone',
        'username',
        'is_active',
        'role_id',
        'permission_name',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'name',
            'email',
            'phone',
            'username',
            'is_active',
            'role_id',
            'permission_name',
        ]);
    }

    public function getRoles()
    {
        return (new RoleService())->index();
    }

    public function getPermissions()
    {
        return (new PermissionService())->index();
    }

    public function getUsers()
    {
        return (new UserService())->index(
            name: $this->name,
            email: $this->email,
            phone: $this->phone,
            username: $this->username,
            is_active: $this->is_active,
            role_id: $this->role_id,
            permission_name: $this->permission_name,
            trash: true,
        );
    }

    public function render()
    {
        return view('livewire.cms.configuration.user.trash', [
            'roles' => $this->getRoles(),
            'permissions' => $this->getPermissions(),
            'users' => $this->getUsers(),
        ]);
    }
}
