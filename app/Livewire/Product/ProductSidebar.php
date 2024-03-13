<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Models\Product;

class ProductSidebar extends Component
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
        return view('livewire.product.sidebar', [
            'products' => $this->getProducts(),
        ]);
    }
}
