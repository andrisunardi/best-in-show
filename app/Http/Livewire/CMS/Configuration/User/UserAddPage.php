<?php

namespace App\Http\Livewire\CMS\Configuration\User;

use App\Http\Livewire\CMS\Component;
use App\Services\RoleService;
use App\Services\UserService;

class UserAddPage extends Component
{
    public $name;

    public $email;

    public $phone;

    public $username;

    public $password;

    public $image;

    public $is_active = true;

    public $role_ids = [];

    public function resetFields()
    {
        $this->reset([
            'name',
            'email',
            'phone',
            'username',
            'password',
            'image',
            'is_active',
            'role_ids',
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50|unique:users,name',
            'email' => 'required|string|max:50|email:rfc,dns|regex:/^\S*$/u|unique:users,email',
            'phone' => 'required|string|max:15|unique:users,phone',
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|string|max:50',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
            'role_ids' => 'nullable|array|exists:roles,id',
        ];
    }

    public function submit()
    {
        $user = (new UserService())->add(data: $this->validate());

        $this->flash(
            'success',
            trans('index.user')." - {$user->id} - ".trans('index.added'),
        );

        return redirect()->route('cms.configuration.user.index');
    }

    public function getRoles()
    {
        return (new RoleService())->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.configuration.user.add', [
            'roles' => $this->getRoles(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
