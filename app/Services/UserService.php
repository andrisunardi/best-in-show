<?php

namespace App\Services;

use App\Models\User;
use App\Utils\LivewireUpload;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public function index(
        string $name = '',
        string $email = '',
        string $phone = '',
        string $username = '',
        array $is_active = [],
        string|int $role_id = '',
        string $permission_name = '',
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $users = User::with('roles.permissions', 'roles', 'permissions')
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($email, fn ($q) => $q->where('email', 'LIKE', "%{$email}%"))
            ->when($phone, fn ($q) => $q->where('phone', 'LIKE', "%{$phone}%"))
            ->when($username, fn ($q) => $q->where('username', 'LIKE', "%{$username}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($role_id, fn ($q) => $q->role($role_id))
            ->when($permission_name, fn ($q) => $q->permission($permission_name))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $users->paginate($per_page);
        }

        return $users->get();
    }

    public function add(array $data = []): User
    {
        $roleIds = $data['role_ids'];
        Arr::pull($data, 'role_ids');

        $data['password'] = Hash::make($data['password']);

        $data['image'] = (new LivewireUpload())->upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'user',
            deleteAsset: false,
        );

        $user = User::create($data);
        $user->assignRole($roleIds);

        return $user;
    }

    public function clone(array $data, User $user): User
    {
        $roleIds = $data['role_ids'];
        Arr::pull($data, 'role_ids');

        $data['password'] = Hash::make($data['password']);

        $data['image'] = (new LivewireUpload())->upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'user',
            checkAsset: $user->checkImage(),
            fileAsset: $user->image,
            deleteAsset: false,
        );

        $user = User::create($data);
        $user->assignRole($roleIds);

        return $user;
    }

    public function edit(User $user, $data): User
    {
        $roleIds = $data['role_ids'];
        Arr::pull($data, 'role_ids');

        $data['image'] = (new LivewireUpload())->upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'user',
            checkAsset: $user->checkImage(),
            fileAsset: $user->image,
            deleteAsset: true,
        );

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            Arr::pull($data, 'password');
        }

        $user->update($data);
        $user->syncRoles($roleIds);
        $user->refresh();

        return $user;
    }

    public function active(User $user): User
    {
        $user->is_active = ! $user->is_active;
        $user->save();
        $user->refresh();

        return $user;
    }

    public function deleteImage(User $user)
    {
        $user->deleteImage();

        $user->image = null;
        $user->save();
        $user->refresh();

        return $user;
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function deleteAll(array $users = []): bool
    {
        return User::when($users, fn ($q) => $q->whereIn('id', $users))->delete();
    }

    public function restore(User $user): bool
    {
        return $user->restore();
    }

    public function restoreAll(array $users = []): bool
    {
        return User::when($users, fn ($q) => $q->whereIn('id', $users))->onlyTrashed()->restore();
    }

    public function deletePermanent(User $user): bool
    {
        $user->deleteImage();

        return $user->forceDelete();
    }

    public function deletePermanentAll(array $users = []): bool
    {
        $users = User::when($users, fn ($q) => $q->whereIn('id', $users))->onlyTrashed()->get();

        foreach ($users as $user) {
            $user->deleteImage();
            $user->forceDelete();
        }

        return true;
    }

    public function editProfile(User $user, $data): User
    {
        $data['image'] = (new LivewireUpload())->upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'user',
            checkAsset: $user->checkImage(),
            fileAsset: $user->image,
            deleteAsset: false,
        );

        $user->update($data);
        $user->refresh();

        return $user;
    }

    public function changePassword(User $user, $data): User
    {
        $user->update(['password' => Hash::make($data['new_password'])]);
        $user->refresh();

        return $user;
    }

    public function resetPassword(User $user): string
    {
        $password = Str::random(5);
        $user->update(['password' => Hash::make($password)]);
        $user->refresh();

        return $password;
    }
}
