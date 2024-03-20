<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Services\SignUpService;

class SignUpRestoreAll extends Component
{
    public function mount()
    {
        (new SignUpService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.sign_up').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.sign-up.trash');
    }
}
