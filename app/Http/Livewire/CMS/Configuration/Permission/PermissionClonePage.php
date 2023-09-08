<?php

namespace App\Http\Livewire\CMS\Configuration\Permission;

use App\Http\Livewire\CMS\Component;
use App\Services\PermissionService;
use App\Services\RoleService;
use Spatie\Permission\Models\Permission;

class PermissionClonePage extends Component
{
    public $permission;

    public $name = '';

    public $guard_name = 'web';

    public $role_ids = [];

    public function mount(Permission $permission)
    {
        $this->name = "{$permission->name} (Copy)";
        $this->guard_name = $permission->guard_name;
        $this->role_ids = $permission->roles->pluck('id')->toArray();
    }

    public function resetFields()
    {
        $this->name = "{$this->permission->name} (Copy)";
        $this->guard_name = $this->permission->guard_name;
        $this->role_ids = $this->permission->roles->pluck('id')->toArray();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:permissions,name',
            'guard_name' => 'required|string|max:255',
            'role_ids' => 'nullable|array|exists:roles,id',
        ];
    }

    public function submit()
    {
        $permission = (new PermissionService())->clone(data: $this->validate(), permission: $this->permission);

        $this->flash(
            'success',
            trans('index.permission')." - {$permission->id} - ".trans('index.cloned'),
        );

        return redirect()->route('cms.configuration.permission.index');
    }

    public function getRoles()
    {
        return (new RoleService())->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.configuration.permission.clone', [
            'roles' => $this->getRoles(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
