<?php

namespace App\Livewire\CMS\Configuration\Role;

use App\Livewire\CMS\Component;
use App\Services\PermissionService;
use App\Services\RoleService;
use Spatie\Permission\Models\Role;

class RoleEditPage extends Component
{
    public $role;

    public $name;

    public $guard_name = 'web';

    public $permission_ids = [];

    public function mount(Role $role)
    {
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->permission_ids = $role->permissions->pluck('id')->toArray();
    }

    public function resetFields()
    {
        $this->name = $this->role->name;
        $this->guard_name = $this->role->guard_name;
        $this->permission_ids = $this->role->permissions->pluck('id')->toArray();
    }

    public function rules()
    {
        return [
            'name' => "required|string|max:255|unique:roles,name,{$this->role->id}",
            'guard_name' => 'required|string|max:255',
            'permission_ids' => 'nullable|array|exists:permissions,id',
        ];
    }

    public function submit()
    {
        $role = (new RoleService())->edit(role: $this->role, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.role')." - {$role->id} - ".trans('index.edited'),
        ]);

        return $this->redirect(route('cms.configuration.role.index'), navigate: true);
    }

    public function getPermissions()
    {
        return (new PermissionService())->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.configuration.role.edit', [
            'permissions' => $this->getPermissions(),
        ]);
    }
}
