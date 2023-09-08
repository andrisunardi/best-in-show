<?php

namespace App\Livewire\CMS\Layouts;

use App\Livewire\CMS\Component;
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
        return $this->redirect(route($this->search_menu), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.layouts.search-menu', [
            'menus' => config('menus'),
        ]);
    }
}
