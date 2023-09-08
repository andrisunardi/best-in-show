<?php

namespace App\Http\Livewire\Layouts;

use App\Http\Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.layouts.header')
            ->extends('layouts.app')
            ->section('content');
    }
}
