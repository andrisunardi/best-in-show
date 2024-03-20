<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Services\SignUpService;

class SignUpDeletePermanentAll extends Component
{
    public function mount()
    {
        (new SignUpService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.sign_up').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.sign-up.trash');
    }
}
