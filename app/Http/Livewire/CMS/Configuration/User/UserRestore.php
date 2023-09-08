<?php

namespace App\Http\Livewire\CMS\Configuration\User;

use App\Http\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;

class UserRestore extends Component
{
    public function mount($user)
    {
        $user = User::onlyTrashed()->findOrFail($user);

        (new UserService())->restore(user: $user);

        $this->flash(
            'success',
            trans('index.user')." - {$user->id} - ".trans('index.restored'),
        );

        return redirect(url()->previous());
    }
}
