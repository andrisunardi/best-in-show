<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Models\SignUp;
use App\Services\SignUpService;

class SignUpDelete extends Component
{
    public function mount(SignUp $signUp)
    {
        (new SignUpService())->delete(signUp: $signUp);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.sign_up')." - {$signUp->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
