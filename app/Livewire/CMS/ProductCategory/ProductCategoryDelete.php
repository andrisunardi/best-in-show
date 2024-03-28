<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Models\ProductCategory;
use App\Services\ProductCategoryService;

class ProductCategoryDelete extends Component
{
    public function mount(ProductCategory $productCategory)
    {
        (new ProductCategoryService())->delete(productCategory: $productCategory);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.product_category')." - {$productCategory->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
