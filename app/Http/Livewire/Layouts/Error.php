<?php

namespace App\Http\Livewire\Layouts;

use App\Http\Livewire\Component;

class Error extends Component
{
    public function render()
    {
        return view('livewire.layouts.error')
            ->extends('layouts.app')
            ->section('content');
    }
}
