<?php

namespace App\Livewire\CMS\SignUp;

use App\Livewire\CMS\Component;
use App\Services\SignUpService;

class SignUpTrashPage extends Component
{
    public $email = '';

    public $is_active = [];

    public $queryString = [
        'email',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'email',
            'is_active',
        ]);
    }

    public function getSignUps()
    {
        return (new SignUpService())->index(
            email: $this->email,
            is_active: $this->is_active,
            trash: true,
        );
    }

    public function render()
    {
        return view('livewire.cms.sign-up.trash', [
            'signUps' => $this->getSignUps(),
        ]);
    }
}
