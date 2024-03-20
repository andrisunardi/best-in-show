<?php

namespace App\Livewire\CMS\ProductType;

use App\Livewire\CMS\Component;
use App\Services\ProductTypeService;

class ProductTypeRestoreAll extends Component
{
    public function mount()
    {
        (new ProductTypeService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.product_type').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.product-type.trash');
    }
}
