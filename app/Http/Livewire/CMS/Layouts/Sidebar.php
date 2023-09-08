<?php

namespace App\Http\Livewire\CMS\Layouts;

use App\Http\Livewire\CMS\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.cms.layouts.sidebar', [
            'menus' => config('menus'),
        ])->extends('cms.layouts.app')->section('content');
    }
}
