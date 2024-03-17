<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Models\Product;

class ProductPage extends Component
{
    protected $listeners = [
        'updated' => 'getProducts',
    ];

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $product_types = [];

    public $product_categories = [];

    public $page = 1;

    public $queryString = [
        'search',
        'product_types',
        'product_categories',
        'page',
    ];

    public function getProducts(string $search = '', array $product_types = [], array $product_categories = [])
    {
        $this->search = $search ?: $this->search;
        $this->product_types = $product_types ?: $this->product_types;
        $this->product_categories = $product_categories ?: $this->product_categories;

        return Product::when($this->search, function ($query) {
            $query->where('name', 'like', "%{$this->search}%")
                ->where('name_idn', 'like', "%{$this->search}%");
        })
            ->when($this->product_types, function ($query) {
                $query->whereIn('product_type_id', $this->product_types);
            })
            ->when($this->product_categories, function ($query) {
                $query->whereIn('product_category_id', $this->product_categories);
            })
            ->latest()->active()->paginate(12);
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => $this->getProducts(),
        ]);
    }
}
