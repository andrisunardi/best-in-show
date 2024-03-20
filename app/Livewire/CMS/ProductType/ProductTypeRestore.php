<?php

namespace App\Livewire\CMS\ProductType;

use App\Livewire\CMS\Component;
use App\Models\ProductType;
use App\Services\ProductTypeService;

class ProductTypeRestore extends Component
{
    public function mount($productType)
    {
        $productType = ProductType::onlyTrashed()->findOrFail($productType);

        (new ProductTypeService())->restore(productType: $productType);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.product_type')." - {$productType->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
