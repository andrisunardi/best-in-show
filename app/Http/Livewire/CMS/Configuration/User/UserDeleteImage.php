<?php

namespace App\Http\Livewire\CMS\Configuration\User;

use App\Http\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;

class UserDeleteImage extends Component
{
    public function mount(User $user)
    {
        (new UserService())->deleteImage(user: $user);

        $this->flash(
            'success',
            trans('index.user')." - {$user->id} - ".trans('index.image').' '.trans('index.deleted'),
        );

        return redirect(url()->previous());
    }
}
