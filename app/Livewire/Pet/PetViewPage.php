<?php

namespace App\Livewire\Pet;

use App\Livewire\Component;
use App\Models\Pet;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;

class PetViewPage extends Component
{
    public $pet;

    public $search = '';

    public $product_types = [];

    public $product_categories = [];

    public $page = 1;

    // protected $listeners = [
    //     'updated' => 'getProducts',
    // ];

    protected $paginationTheme = 'tailwind';

    public $queryString = [
        'search',
        'product_types',
        'product_categories',
        'page',
    ];

    public function mount($slug)
    {
        $this->pet = Pet::where('slug', $slug)->active()->firstOrFail();
    }

    public function updatedPage($page)
    {
        $this->page = $page;
    }

    // public function getProducts(string $search = '', array $product_types = [], array $product_categories = [])
    // {
    //     $this->search = $search ?: $this->search;
    //     $this->product_types = $product_types ?: $this->product_types;
    //     $this->product_categories = $product_categories ?: $this->product_categories;

    //     return Product::where('pet_id', $this->pet->id)
    //         ->when($this->search, function ($query) {
    //             $query->where(function ($query) {
    //                 $query->where('name', 'like', "%{$this->search}%")
    //                     ->orWhere('name_idn', 'like', "%{$this->search}%")
    //                     ->orWhere('description', 'like', "%{$this->search}%")
    //                     ->orWhere('description_idn', 'like', "%{$this->search}%");
    //                 });
    //             })
    //         ->when($this->product_types, function ($query) {
    //             $query->whereIn('product_type_id', $this->product_types);
    //         })
    //         ->when($this->product_categories, function ($query) {
    //             $query->whereIn('product_category_id', $this->product_categories);
    //         })
    //         ->latest()->active()->paginate(12);
    // }

    public function getProducts()
    {
        return Product::where('pet_id', $this->pet->id)
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('name_idn', 'like', "%{$this->search}%")
                        ->orWhere('description', 'like', "%{$this->search}%")
                        ->orWhere('description_idn', 'like', "%{$this->search}%");
                });
            })
            ->when($this->product_types, function ($query) {
                $query->whereIn('product_type_id', $this->product_types);
            })
            ->when($this->product_categories, function ($query) {
                $query->whereIn('product_category_id', $this->product_categories);
            })
            ->latest()->active()->paginate(12);
    }

    public function getFilterProductTypes()
    {
        return ProductType::where('pet_id', $this->pet->id)
            ->whereIn('id', $this->product_types)
            ->active()
            ->get();
    }

    public function getFilterProductCategories()
    {
        return ProductCategory::where('pet_id', $this->pet->id)
            ->whereIn('id', $this->product_categories)
            ->active()
            ->get();
    }

    public function removeFilterProductTypes(ProductType $productType)
    {
        $key = array_search($productType->id, $this->product_types);

        if ($key !== false) {
            unset($this->product_types[$key]);
        }

        $this->product_types = array_values($this->product_types);
    }

    public function removeFilterProductCategories(ProductCategory $productCategory)
    {
        $key = array_search($productCategory->id, $this->product_categories);

        if ($key !== false) {
            unset($this->product_categories[$key]);
        }

        $this->product_categories = array_values($this->product_categories);
    }

    public function render()
    {
        return view('livewire.pet.view', [
            'filterProductTypes' => $this->getFilterProductTypes(),
            'filterProductCategories' => $this->getFilterProductCategories(),
            'products' => $this->getProducts(),
        ]);
    }
}
