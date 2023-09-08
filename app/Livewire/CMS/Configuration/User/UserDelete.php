<?php

namespace App\Livewire\CMS\Configuration\User;

use App\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;

class UserDelete extends Component
{
    public function mount(User $user)
    {
        (new UserService())->delete(user: $user);

        $this->flash(
            'success',
            trans('index.user')." - {$user->id} - ".trans('index.deleted'),
        );

        return redirect(url()->previous());
    }
}
