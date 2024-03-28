<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Models\ProductCategory;
use App\Services\ProductCategoryService;
use Illuminate\Support\Str;

class ProductCategoryDeletePermanent extends Component
{
    public function mount($productCategory)
    {
        $productCategory = ProductCategory::onlyTrashed()->findOrFail($productCategory);

        (new ProductCategoryService())->deletePermanent(productCategory: $productCategory);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.product_category')." - {$productCategory->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.product-category.trash');
        }

        return redirect()->route('cms.product-category.index');
    }
}
