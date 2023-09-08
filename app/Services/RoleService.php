<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function index(
        string|int $permission_id = '',
        string $name = '',
        string $guard_name = '',
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
    ): object {
        $roles = Role::with('permissions', 'users')
            ->when($permission_id, fn ($q) => $q->whereRelation('permissions', 'id', $permission_id))
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($guard_name, fn ($q) => $q->where('guard_name', 'LIKE', "%{$guard_name}%"))
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $roles->paginate($per_page);
        }

        return $roles->get();
    }

    public function add(array $data = []): Role
    {
        $permissionIds = $data['permission_ids'];
        Arr::pull($data, 'permission_ids');

        $role = Role::create($data);
        $role->givePermissionTo($permissionIds);

        return $role;
    }

    public function clone(array $data, Role $role): Role
    {
        $permissionIds = $data['permission_ids'];
        Arr::pull($data, 'permission_ids');

        $role = Role::create($data);
        $role->givePermissionTo($permissionIds);

        return $role;
    }

    public function edit(Role $role, $data): Role
    {
        $permissionIds = $data['permission_ids'];
        Arr::pull($data, 'permission_ids');

        $role->update($data);
        $role->syncPermissions($permissionIds);
        $role->refresh();

        return $role;
    }

    public function delete(Role $role): bool
    {
        return $role->delete();
    }

    public function deleteAll(array $roles = []): bool
    {
        return Role::when($roles, fn ($q) => $q->whereIn('id', $roles))->delete();
    }
}
