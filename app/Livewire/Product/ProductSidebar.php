<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Services\PetService;

class ProductSidebar extends Component
{
    public $search = '';

    public $product_types = [];

    public $product_categories = [];

    public $queryString = [
        'search',
        'product_types',
        'product_categories',
    ];

    public function getPets()
    {
        return (new PetService())->index(orderBy: 'id', sortBy: 'asc', paginate: false);
    }

    public function updated()
    {
        $this->dispatch('updated', $this->search, $this->product_types, $this->product_categories);
    }

    public function render()
    {
        return view('livewire.product.sidebar', [
            'pets' => $this->getPets(),
        ]);
    }
}
