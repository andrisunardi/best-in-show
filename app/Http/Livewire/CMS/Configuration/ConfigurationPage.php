<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\DB;

class ConfigurationPage extends Component
{
    public $menuCategory = 'Configuration';

    public function getMenus()
    {
        $menus = collect(config('menus'))
            ->firstWhere('name', $this->menuCategory)['subMenus'] ?? [];

        $menus = collect($menus)
            ->filter(fn ($q) => $q['table'] !== null && $q['sidebar'] === true)
            ->map(function ($subMenu) {
                $subMenu['total'] = $subMenu['table'] ? DB::table($subMenu['table'])->count() : 0;

                return $subMenu;
            });

        return $menus;
    }

    public function render()
    {
        return view('livewire.cms.configuration.index', [
            'menus' => $this->getMenus(),
            'bgClasses' => $this->getBgClasses(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
