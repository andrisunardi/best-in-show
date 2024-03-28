<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Services\ProductCategoryService;

class ProductCategoryDeletePermanentAll extends Component
{
    public function mount()
    {
        (new ProductCategoryService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.product_category').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.product-category.trash');
    }
}
