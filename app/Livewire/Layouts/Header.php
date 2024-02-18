<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;

class Header extends Component
{
    public function getPets()
    {
        return view('livewire.layouts.header');
    }

    public function render()
    {
        return view('livewire.layouts.header');
    }
}
