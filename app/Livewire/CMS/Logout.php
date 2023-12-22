<?php

namespace App\Livewire\CMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    public function mount()
    {
        Auth::logout();
        Session::flush();

        $this->flash('success', trans('index.logout_success'), [
            'html' => trans('index.you_have_been_successfully_logged_out'),
        ]);

        return $this->redirect(route('cms.login'), navigate: true);
    }
}
