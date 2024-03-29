<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\CMS\Component;
use App\Services\PetService;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use App\Services\ProductTypeService;

class ProductPage extends Component
{
    public $pet_id = '';

    public $product_type_id = '';

    public $product_category_id = '';

    public $name = '';

    public $name_idn = '';

    public $description = '';

    public $description_idn = '';

    public $variant = '';

    public $variant_idn = '';

    public $size = '';

    public $weight = '';

    public $color = '';

    public $blibli = '';

    public $lazada = '';

    public $shopee = '';

    public $tokopedia = '';

    public $is_active = [];

    public $queryString = [
        'pet_id',
        'product_type_id',
        'product_category_id',
        'name',
        'name_idn',
        'description',
        'description_idn',
        'variant',
        'variant_idn',
        'size',
        'weight',
        'color',
        'blibli',
        'lazada',
        'shopee',
        'tokopedia',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'pet_id',
            'product_type_id',
            'product_category_id',
            'name',
            'name_idn',
            'description',
            'description_idn',
            'variant',
            'variant_idn',
            'size',
            'weight',
            'color',
            'blibli',
            'lazada',
            'shopee',
            'tokopedia',
            'is_active',
        ]);
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function getProducts()
    {
        return (new ProductService())->index(
            pet_id: $this->pet_id,
            name: $this->name,
            name_idn: $this->name_idn,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function getProductTypes()
    {
        if (! $this->pet_id) {
            return collect();
        }

        return (new ProductTypeService())->index(
            pet_id: $this->pet_id,
            is_active: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getProductCategories()
    {
        if (! $this->product_type_id) {
            return collect();
        }

        return (new ProductCategoryService())->index(
            pet_id: $this->pet_id,
            product_type_id: $this->product_type_id,
            is_active: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.product.index', [
            'pets' => $this->getPets(),
            'productTypes' => $this->getProductTypes(),
            'productCategories' => $this->getProductCategories(),
            'products' => $this->getProducts(),
        ]);
    }
}
