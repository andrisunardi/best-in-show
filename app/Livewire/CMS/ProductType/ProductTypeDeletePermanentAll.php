<?php

namespace App\Livewire\CMS\ProductType;

use App\Livewire\CMS\Component;
use App\Services\ProductTypeService;

class ProductTypeDeletePermanentAll extends Component
{
    public function mount()
    {
        (new ProductTypeService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.product_type').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.product-type.trash');
    }
}
