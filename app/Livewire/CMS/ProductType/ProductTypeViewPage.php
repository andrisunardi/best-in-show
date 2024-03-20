<?php

namespace App\Livewire\CMS\ProductType;

use App\Livewire\CMS\Component;
use App\Models\ProductType;

class ProductTypeViewPage extends Component
{
    public $productType;

    public function mount($productType)
    {
        $this->productType = ProductType::withTrashed()->findOrFail($productType);
    }

    public function render()
    {
        return view('livewire.cms.product-type.view');
    }
}
