<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\CMS\Component;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class EditProfilePage extends Component
{
    public $name;

    public $username;

    public $email;

    public $phone;

    public $image;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
    }

    public function resetFields()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50|unique:users,name,'.Auth::user()->id,
            'username' => 'required|string|max:50|unique:users,username,'.Auth::user()->id,
            'email' => 'required|string|max:50|unique:users,email,'.Auth::user()->id,
            'phone' => 'required|string|max:20|unique:users,phone,'.Auth::user()->id,
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit()
    {
        (new UserService())->editProfile(Auth::user(), $this->validate());

        $this->resetFields();
        $this->resetValidation();

        return $this->alert('success', trans('index.edit_profile_success'), [
            'html' => trans('index.your_profile_has_been_successfully_updated'),
        ]);
    }

    public function render()
    {
        return view('livewire.cms.profile.edit-profile');
    }
}
