<?php

namespace App\Http\Livewire\CMS\Configuration\Role;

use App\Http\Livewire\CMS\Component;
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

        $this->flash(
            'success',
            trans('index.role')." - {$role->id} - ".trans('index.added'),
        );

        return redirect()->route('cms.configuration.role.index');
    }

    public function getPermissions()
    {
        return (new PermissionService())->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.configuration.role.add', [
            'permissions' => $this->getPermissions(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
