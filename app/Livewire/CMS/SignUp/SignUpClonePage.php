<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Models\SignUp;
use App\Services\SignUpService;

class SignUpClonePage extends Component
{
    public $signUp;

    public $email;

    public $is_active = true;

    public function mount(SignUp $signUp)
    {
        $this->email = "{$signUp->email} (Copy)";
        $this->is_active = $signUp->is_active;
    }

    public function resetFields()
    {
        $this->email = "{$this->signUp->email} (Copy)";
        $this->email = $this->signUp->email;
        $this->is_active = $this->signUp->is_active;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|max:100|unique:sign_ups,email',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $signUp = (new SignUpService())->clone(data: $this->validate(), signUp: $this->signUp);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.sign_up')." - {$signUp->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.sign-up.index');
    }

    public function render()
    {
        return view('livewire.cms.sign-up.clone');
    }
}
