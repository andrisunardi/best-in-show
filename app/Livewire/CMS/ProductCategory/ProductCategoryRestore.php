<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Models\ProductCategory;
use App\Services\ProductCategoryService;

class ProductCategoryRestore extends Component
{
    public function mount($productCategory)
    {
        $productCategory = ProductCategory::onlyTrashed()->findOrFail($productCategory);

        (new ProductCategoryService())->restore(productCategory: $productCategory);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.product_category')." - {$productCategory->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
