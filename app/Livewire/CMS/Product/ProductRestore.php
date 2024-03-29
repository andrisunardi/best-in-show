<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\CMS\Component;
use App\Models\Product;
use App\Services\ProductService;

class ProductRestore extends Component
{
    public function mount($product)
    {
        $product = Product::onlyTrashed()->findOrFail($product);

        (new ProductService())->restore(product: $product);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.product')." - {$product->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
