<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\CMS\Component;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordPage extends Component
{
    public $current_password;

    public $new_password;

    public $confirm_password;

    public function resetFields()
    {
        $this->reset([
            'current_password',
            'new_password',
            'confirm_password',
        ]);
    }

    public function rules()
    {
        return [
            'current_password' => 'required|string|max:50',
            'new_password' => 'required|string|max:50|same:confirm_password',
            'confirm_password' => 'required|string|max:50|same:new_password',
        ];
    }

    public function submit()
    {
        if (! Hash::check($this->current_password, Auth::user()->password)) {
            return $this->alert('error', trans('index.change_password_failed'), [
                'html' => trans('index.current_password_is_incorrect'),
            ]);
        }

        if ($this->new_password != $this->confirm_password) {
            return $this->alert('error', trans('index.change_password_failed'), [
                'html' => trans('index.new_password_and_confirm_password_does_not_match'),
            ]);
        }

        (new UserService())->changePassword(user: Auth::user(), data: $this->validate());

        $this->resetFields();
        $this->resetValidation();

        return $this->alert('success', trans('index.change_password_success'), [
            'html' => trans('index.forgot_password_success'),
        ]);
    }

    public function render()
    {
        return view('livewire.cms.profile.change-password');
    }
}
