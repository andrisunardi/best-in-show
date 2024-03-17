<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Services\PetService;

class ProductSidebar extends Component
{
    public $search = '';

    public $queryString = [
        'search',
    ];

    public function getPets()
    {
        return (new PetService())->index(orderBy: 'id', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.product.sidebar', [
            'pets' => $this->getPets(),
        ]);
    }
}
