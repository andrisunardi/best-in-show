<?php

namespace App\Livewire\CMS\Configuration\Role;

use App\Livewire\CMS\Component;
use App\Services\PermissionService;
use App\Services\RoleService;

class RoleAddPage extends Component
{
    public $name;

    public $guard_name = 'web';

    public $permission_ids = [];

    public function resetFields()
    {
        $this->reset([
            'name',
            'guard_name',
            'permission_ids',
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string|max:255',
            'permission_ids' => 'nullable|array|exists:permissions,id',
        ];
    }

    public function submit()
    {
        $role = (new RoleService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.role')." - {$role->id} - ".trans('index.added'),
        ]);

        return $this->redirect(route('cms.configuration.role.index'), navigate: true);
    }

    public function getPermissions()
    {
        return (new PermissionService())->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.configuration.role.add', [
            'permissions' => $this->getPermissions(),
        ]);
    }
}
