<?php

namespace App\Livewire\CMS\ProductType;

use App\Livewire\CMS\Component;
use App\Models\ProductType;
use App\Services\ProductTypeService;

class ProductTypeDelete extends Component
{
    public function mount(ProductType $productType)
    {
        (new ProductTypeService())->delete(productType: $productType);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.product_type')." - {$productType->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
