<?php

namespace App\Livewire\CMS\Login;

use App\Livewire\CMS\Component;
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
            $this->flash('info', trans('index.login_failed'), ['html' => trans('index.you_already_login')]);

            return $this->redirect(route('cms.index'), navigate: true);
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
                $this->flash('success', trans('index.login_success'), ['html' => trans('index.login_has_been_successfully')]);

                return $this->redirect(session()->pull('url.intended', route('cms.index')), navigate: true);
            } else {
                Auth::logout();
                Session::flush();
            }
        }

        $this->alert('error', trans('index.login_failed'), ['html' => trans('index.username_or_password_is_invalid')]);
    }

    public function render()
    {
        return view('livewire.cms.login.index');
    }
}
