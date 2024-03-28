<?php

namespace App\Livewire\Pet;

use App\Livewire\Component;
use App\Models\Product;

class PetModal extends Component
{
    public $search = '';

    public $queryString = [
        'search',
    ];

    public function getProducts()
    {
        return Product::when($this->search, function ($query) {
            $query->where('name', $this->search);
        })->latest()->active()->get();
    }

    public function render()
    {
        return view('livewire.pet.modal', [
            'products' => $this->getProducts(),
        ]);
    }
}
