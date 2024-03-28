<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Models\ProductCategory;

class ProductCategoryViewPage extends Component
{
    public $productCategory;

    public function mount($productCategory)
    {
        $this->productCategory = ProductCategory::withTrashed()->findOrFail($productCategory);
    }

    public function render()
    {
        return view('livewire.cms.product-category.view');
    }
}
