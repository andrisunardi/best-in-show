<?php

namespace App\Livewire\CMS\ProductType;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\ProductType;
use App\Services\ProductTypeService;

class ProductTypeActive extends Component
{
    public function mount(ProductType $productType)
    {
        (new ProductTypeService())->active(productType: $productType);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.product_type')." - {$productType->id} - ".Utils::translate(Utils::active($productType->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
