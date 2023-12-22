<?php

namespace App\Livewire\CMS\Configuration\User;

use App\Livewire\CMS\Component;
use App\Services\UserService;

class UserDeletePermanentAll extends Component
{
    public function mount()
    {
        (new UserService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.user').' - '.trans('index.deleted_permanently'),
        ]);

        return $this->redirect(route('cms.configuration.user.trash'), navigate: true);
    }
}
