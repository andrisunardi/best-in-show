<?php

namespace App\Http\Livewire;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home.index')
            ->extends('layouts.app')
            ->section('content');
    }
}
