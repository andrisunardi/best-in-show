<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Models\SignUp;
use App\Services\SignUpService;
use Illuminate\Support\Str;

class SignUpDeletePermanent extends Component
{
    public function mount($signUp)
    {
        $signUp = SignUp::onlyTrashed()->findOrFail($signUp);

        (new SignUpService())->deletePermanent(signUp: $signUp);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.sign_up')." - {$signUp->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.sign-up.trash');
        }

        return redirect()->route('cms.sign-up.index');
    }
}
