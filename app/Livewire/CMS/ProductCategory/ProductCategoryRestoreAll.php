<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Services\ProductCategoryService;

class ProductCategoryRestoreAll extends Component
{
    public function mount()
    {
        (new ProductCategoryService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.product_category').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.product-category.trash');
    }
}
