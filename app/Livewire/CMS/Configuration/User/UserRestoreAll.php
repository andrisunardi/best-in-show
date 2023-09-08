<?php

namespace App\Livewire\CMS\Configuration\User;

use App\Livewire\CMS\Component;
use App\Services\UserService;

class UserRestoreAll extends Component
{
    public function mount()
    {
        (new UserService())->restoreAll();

        $this->flash(
            'success',
            trans('index.all').' - '.trans('index.user').' - '.trans('index.restored'),
        );

        return $this->redirect(route('cms.configuration.user.trash'), navigate: true);
    }
}
