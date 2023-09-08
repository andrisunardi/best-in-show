<?php

namespace App\Livewire\CMS\Configuration\User;

use App\Livewire\CMS\Component;
use App\Models\User;

class UserViewPage extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = User::with('roles.permissions', 'roles', 'permissions')->withTrashed()->findOrFail($user);
    }

    public function render()
    {
        return view('livewire.cms.configuration.user.view');
    }
}
