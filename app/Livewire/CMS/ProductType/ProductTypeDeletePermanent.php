<?php

namespace App\Livewire\CMS\ProductType;

use App\Livewire\CMS\Component;
use App\Models\ProductType;
use App\Services\ProductTypeService;
use Illuminate\Support\Str;

class ProductTypeDeletePermanent extends Component
{
    public function mount($productType)
    {
        $productType = ProductType::onlyTrashed()->findOrFail($productType);

        (new ProductTypeService())->deletePermanent(productType: $productType);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.product_type')." - {$productType->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.product-type.trash');
        }

        return redirect()->route('cms.product-type.index');
    }
}
