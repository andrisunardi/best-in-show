<?php

namespace App\Livewire\Pet;

use App\Livewire\Component;

class PetSidebar extends Component
{
    public $pet;

    public $search = '';

    public $product_types = [];

    public $product_categories = [];

    public $queryString = [
        'search',
        'product_types',
        'product_categories',
    ];

    public function updated()
    {
        $this->dispatch('updated', $this->search, $this->product_types, $this->product_categories);
    }

    public function render()
    {
        return view('livewire.pet.sidebar');
    }
}
