<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Services\PetService;
use App\Services\ProductCategoryService;
use App\Services\ProductTypeService;

class ProductCategoryPage extends Component
{
    public $pet_id = '';

    public $product_type_id = '';

    public $name = '';

    public $name_idn = '';

    public $is_active = [];

    public $queryString = [
        'pet_id',
        'product_type_id',
        'name',
        'name_idn',
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
            'name',
            'name_idn',
            'is_active',
        ]);
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function getProductTypes()
    {
        return (new ProductTypeService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function getProductCategories()
    {
        return (new ProductCategoryService())->index(
            pet_id: $this->pet_id,
            name: $this->name,
            name_idn: $this->name_idn,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.product-category.index', [
            'pets' => $this->getPets(),
            'productTypes' => $this->getProductTypes(),
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
