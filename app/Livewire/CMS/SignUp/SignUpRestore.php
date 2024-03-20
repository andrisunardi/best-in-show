<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Models\SignUp;
use App\Services\SignUpService;

class SignUpRestore extends Component
{
    public function mount($signUp)
    {
        $signUp = SignUp::onlyTrashed()->findOrFail($signUp);

        (new SignUpService())->restore(signUp: $signUp);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.sign_up')." - {$signUp->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
