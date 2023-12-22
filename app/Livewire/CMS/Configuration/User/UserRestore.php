<?php

namespace App\Livewire\CMS\Configuration\User;

use App\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;

class UserRestore extends Component
{
    public function mount($user)
    {
        $user = User::onlyTrashed()->findOrFail($user);

        (new UserService())->restore(user: $user);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.user')." - {$user->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
