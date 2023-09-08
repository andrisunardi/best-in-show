<?php

namespace App\Http\Livewire\CMS\Configuration\User;

use App\Http\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Str;

class UserActive extends Component
{
    public function mount(User $user)
    {
        (new UserService())->active(user: $user);

        $this->flash(
            'success',
            trans('index.user')." - {$user->id} - ".Str::translate(Str::active($user->is_active)),
        );

        return redirect(url()->previous());
    }
}
