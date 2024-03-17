<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Models\Product;

class ProductPage extends Component
{
    public $search = '';

    public $queryString = [
        'search',
    ];

    public function getProducts()
    {
        return Product::when($this->search, function ($query) {
            $query->where('name', $this->search);
        })->latest()->active()->paginate(12);
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => $this->getProducts(),
        ]);
    }
}
