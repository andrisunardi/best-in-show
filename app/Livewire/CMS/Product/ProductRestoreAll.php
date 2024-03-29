<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\CMS\Component;
use App\Services\ProductService;

class ProductRestoreAll extends Component
{
    public function mount()
    {
        (new ProductService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.product').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.product.trash');
    }
}
