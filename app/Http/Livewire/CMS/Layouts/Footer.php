<?php

namespace App\Http\Livewire\CMS\Layouts;

use App\Http\Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.cms.layouts.footer')
            ->extends('layouts.app')
            ->section('content');
    }
}
