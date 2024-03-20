<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Services\SignUpService;

class SignUpAddPage extends Component
{
    public $email;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'email',
        ]);
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
        $signUp = (new SignUpService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.sign_up')." - {$signUp->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.sign-up.index');
    }

    public function render()
    {
        return view('livewire.cms.sign-up.add');
    }
}
