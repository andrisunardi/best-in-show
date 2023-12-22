<?php

namespace App\Livewire\CMS\Configuration\User;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;

class UserActive extends Component
{
    public function mount(User $user)
    {
        (new UserService())->active(user: $user);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.user')." - {$user->id} - ".Utils::translate(Utils::active($user->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
