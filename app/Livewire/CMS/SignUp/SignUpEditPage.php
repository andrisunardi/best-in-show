<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Models\SignUp;
use App\Services\SignUpService;

class SignUpEditPage extends Component
{
    public $signUp;

    public $email;

    public $is_active = true;

    public function mount(SignUp $signUp)
    {
        $this->email = $signUp->email;
        $this->is_active = $signUp->is_active;
    }

    public function resetFields()
    {
        $this->email = $this->signUp->email;
        $this->is_active = $this->signUp->is_active;
    }

    public function rules()
    {
        return [
            'email' => "required|string|max:100|unique:sign_ups,email,{$this->signUp->id}",
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $signUp = (new SignUpService())->edit(signUp: $this->signUp, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.sign_up')." - {$signUp->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.sign-up.index');
    }

    public function render()
    {
        return view('livewire.cms.sign-up.edit');
    }
}
