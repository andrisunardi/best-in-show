<?php

namespace App\Http\Livewire\CMS;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordPage extends Component
{
    public $username;

    public $email;

    public $phone;

    public $confirm_reset;

    public function mount()
    {
        if (Auth::check()) {
            $this->flash('info', trans('index.you_already_login'));

            return redirect()->route('cms.index');
        }
    }

    public function rules()
    {
        return [
            'username' => 'required|string|max:50|exists:users,username',
            'email' => 'required|string|max:50|email:rfc,dns|exists:users,email',
            'phone' => 'required|string|max:50|exists:users,phone',
            'confirm_reset' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $this->validate();

        $user = User::where('username', $this->username)
            ->where('email', $this->email)
            ->where('phone', $this->phone)
            ->role(config('app.cms_roles'))
            ->first();

        if (! $user) {
            return $this->alert('error', trans('index.username_or_email_or_phone_is_invalid'));
        }

        $password = (new UserService())->resetPassword($user);

        $this->flash('success', trans('validation.attributes.new_password')." : {$password}");

        return redirect()->route('cms.login');
    }

    public function render()
    {
        return view('livewire.cms.forgot-password.index')
            ->extends('layouts.cms.app')
            ->section('content');
    }
}
