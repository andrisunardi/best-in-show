<?php

namespace App\Http\Livewire\CMS\Configuration\User;

use App\Http\Livewire\CMS\Component;
use App\Services\UserService;

class UserDeletePermanentAll extends Component
{
    public function mount()
    {
        (new UserService())->deletePermanentAll();

        $this->flash(
            'success',
            trans('index.all').' - '.trans('index.user').' - '.trans('index.deleted_permanently'),
        );

        return redirect()->route('cms.configuration.user.trash');
    }
}
