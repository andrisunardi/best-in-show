<?php

namespace App\Http\Livewire\CMS\Configuration\Permission;

use App\Http\Livewire\CMS\Component;
use App\Services\PermissionService;
use App\Services\RoleService;
use Spatie\Permission\Models\Permission;

class PermissionEditPage extends Component
{
    public $permission;

    public $name = '';

    public $guard_name = 'web';

    public $role_ids = [];

    public function mount(Permission $permission)
    {
        $this->name = $permission->name;
        $this->guard_name = $permission->guard_name;
        $this->role_ids = $permission->roles->pluck('id')->toArray();
    }

    public function resetFields()
    {
        $this->name = $this->permission->name;
        $this->guard_name = $this->permission->guard_name;
        $this->role_ids = $this->permission->roles->pluck('id')->toArray();
    }

    public function rules()
    {
        return [
            'name' => "required|string|max:255|unique:permissions,name,{$this->permission->id}",
            'guard_name' => 'required|string|max:255',
            'role_ids' => 'nullable|array|exists:roles,id',
        ];
    }

    public function submit()
    {
        $permission = (new PermissionService())->edit(permission: $this->permission, data: $this->validate());

        $this->flash(
            'success',
            trans('index.permission')." - {$permission->id} - ".trans('index.edited'),
        );

        return redirect()->route('cms.configuration.permission.index');
    }

    public function getRoles()
    {
        return (new RoleService())->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.configuration.permission.edit', [
            'roles' => $this->getRoles(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
