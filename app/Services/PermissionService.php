<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    public function index(
        string|int $role_id = '',
        string $name = '',
        string $guard_name = '',
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
    ): object {
        $permissions = Permission::with('roles', 'users')
            ->when($role_id, fn ($q) => $q->whereRelation('roles', 'id', $role_id))
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($guard_name, fn ($q) => $q->where('guard_name', 'LIKE', "%{$guard_name}%"))
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $permissions->paginate($per_page);
        }

        return $permissions->get();
    }

    public function add(array $data = []): Permission
    {
        $roleIds = $data['role_ids'];
        Arr::pull($data, 'role_ids');

        $permission = Permission::create($data);
        $permission->assignRole($roleIds);

        return $permission;
    }

    public function clone(array $data, Permission $permission): Permission
    {
        $roleIds = $data['role_ids'];
        Arr::pull($data, 'role_ids');

        $permission = Permission::create($data);
        $permission->assignRole($roleIds);

        return $permission;
    }

    public function edit(Permission $permission, $data): Permission
    {
        $roleIds = $data['role_ids'];
        Arr::pull($data, 'role_ids');

        $permission->update($data);
        $permission->syncRoles($roleIds);
        $permission->refresh();

        return $permission;
    }

    public function delete(Permission $permission): bool
    {
        return $permission->delete();
    }

    public function deleteAll(array $permissions = []): bool
    {
        return Permission::when($permissions, fn ($q) => $q->whereIn('id', $permissions))->delete();
    }
}
