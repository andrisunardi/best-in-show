<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\CMS\Component;
use App\Services\ProductService;

class ProductDeletePermanentAll extends Component
{
    public function mount()
    {
        (new ProductService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.product').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.product.trash');
    }
}
