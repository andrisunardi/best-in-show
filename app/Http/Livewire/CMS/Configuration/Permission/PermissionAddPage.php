<?php

namespace App\Http\Livewire\CMS\Configuration\Permission;

use App\Http\Livewire\CMS\Component;
use App\Services\PermissionService;
use App\Services\RoleService;

class PermissionAddPage extends Component
{
    public $name = '';

    public $guard_name = 'web';

    public $role_ids = [];

    public function resetFields()
    {
        $this->reset([
            'name',
            'guard_name',
            'role_ids',
        ]);
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
        $permission = (new PermissionService())->add(data: $this->validate());

        $this->flash(
            'success',
            trans('index.permission')." - {$permission->id} - ".trans('index.added'),
        );

        return redirect()->route('cms.configuration.permission.index');
    }

    public function getRoles()
    {
        return (new RoleService())->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.configuration.permission.add', [
            'roles' => $this->getRoles(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
