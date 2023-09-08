<?php

namespace App\Http\Livewire\CMS\Layouts;

use App\Http\Livewire\Component;

class Error extends Component
{
    public function render()
    {
        return view('livewire.cms.layouts.error')
            ->extends('layouts.app')
            ->section('content');
    }
}
