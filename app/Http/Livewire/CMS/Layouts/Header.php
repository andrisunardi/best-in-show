<?php

namespace App\Http\Livewire\CMS\Layouts;

use App\Http\Livewire\CMS\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.cms.layouts.header')
            ->extends('layouts.app')
            ->section('content');
    }
}
