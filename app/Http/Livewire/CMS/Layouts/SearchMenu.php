<?php

namespace App\Http\Livewire\CMS\Layouts;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\Route;

class SearchMenu extends Component
{
    public $search_menu;

    public function mount()
    {
        $this->search_menu = Route::currentRouteName();
    }

    public function submit()
    {
        return redirect()->route($this->search_menu);
    }

    public function render()
    {
        return view('livewire.cms.layouts.search-menu', [
            'menus' => config('menus'),
        ])->extends('layouts.cms.app')->section('content');
    }
}
