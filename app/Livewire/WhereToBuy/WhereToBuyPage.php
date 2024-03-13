<?php

namespace App\Livewire\WhereToBuy;

use App\Livewire\Component;
use App\Models\Store;

class WhereToBuyPage extends Component
{
    public $category;

    public function getStores()
    {
        return Store::when($this->category, fn ($q) => $q->where('category', $this->category))
            ->orderBy('name')
            ->active()
            ->get();
    }

    public function render()
    {
        return view('livewire.where-to-buy.index', [
            'stories' => $this->getStores(),
        ]);
    }
}
