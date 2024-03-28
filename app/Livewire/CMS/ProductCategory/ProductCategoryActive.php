<?php

namespace App\Livewire\CMS\ProductCategory;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\ProductCategory;
use App\Services\ProductCategoryService;

class ProductCategoryActive extends Component
{
    public function mount(ProductCategory $productCategory)
    {
        (new ProductCategoryService())->active(productCategory: $productCategory);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.product_category')." - {$productCategory->id} - ".Utils::translate(Utils::active($productCategory->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
