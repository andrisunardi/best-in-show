<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\CMS\Component;
use Illuminate\Support\Facades\Auth;

class ProfilePage extends Component
{
    public function lastActivity()
    {
        return Auth::user()->activities->loadMissing('subject', 'causer')->last();
    }

    public function render()
    {
        return view('livewire.cms.profile.index', [
            'lastActivity' => $this->lastActivity(),
        ]);
    }
}
