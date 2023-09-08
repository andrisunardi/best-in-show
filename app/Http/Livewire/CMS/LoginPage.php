<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginPage extends Component
{
    public $username;

    public $password;

    public $remember;

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
            'password' => 'required|string|max:50',
            'remember' => 'nullable|boolean',
        ];
    }

    public function submit()
    {
        $this->validate();

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
            if (Auth::user()->hasAnyRole(config('app.cms_roles'))) {
                $this->flash('success', trans('index.login_has_been_successfully'));

                return redirect()->intended(env('APP_CMS_URL'));
            } else {
                Auth::logout();
                Session::flush();
            }
        }

        $this->alert('error', trans('index.username_or_password_is_invalid'));
    }

    public function render()
    {
        return view('livewire.cms.login.index')
            ->extends('layouts.cms.app')
            ->section('content');
    }
}
