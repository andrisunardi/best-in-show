<?php

namespace App\Livewire\CMS\SignUp;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\SignUp;
use App\Services\SignUpService;

class SignUpActive extends Component
{
    public function mount(SignUp $signUp)
    {
        (new SignUpService())->active(signUp: $signUp);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.sign_up')." - {$signUp->id} - ".Utils::translate(Utils::active($signUp->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
