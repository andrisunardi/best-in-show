<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Models\SignUp;

class SignUpViewPage extends Component
{
    public $signUp;

    public function mount($signUp)
    {
        $this->signUp = SignUp::withTrashed()->findOrFail($signUp);
    }

    public function render()
    {
        return view('livewire.cms.sign-up.view');
    }
}
