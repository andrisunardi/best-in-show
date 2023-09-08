<?php

namespace App\Livewire\CMS\Configuration\User;

use App\Livewire\CMS\Component;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;

class UserClonePage extends Component
{
    public $user;

    public $name;

    public $email;

    public $phone;

    public $username;

    public $password;

    public $image;

    public $is_active = true;

    public $role_ids = [];

    public function mount(User $user)
    {
        $this->name = "{$user->name} (Copy)";
        $this->email = "copy_{$user->email}";
        $this->phone = $user->phone + 1;
        $this->username = "{$user->username}_copy";
        $this->is_active = $user->is_active;
        $this->role_ids = $user->roles->pluck('id')->toArray();
    }

    public function resetFields()
    {
        $this->name = "{$this->user->name} (Copy)";
        $this->email = "copy_{$this->user->email}";
        $this->phone = $this->user->phone + 1;
        $this->username = "{$this->user->username}_copy";
        $this->is_active = $this->user->is_active;
        $this->role_ids = $this->user->roles->pluck('id')->toArray();
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
        $user = (new UserService())->clone(data: $this->validate(), user: $this->user);

        $this->flash(
            'success',
            trans('index.user')." - {$user->id} - ".trans('index.cloned'),
        );

        return $this->redirect(route('cms.configuration.user.index'), navigate: true);
    }

    public function getRoles()
    {
        return (new RoleService())->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.configuration.user.clone', [
            'roles' => $this->getRoles(),
        ]);
    }
}
