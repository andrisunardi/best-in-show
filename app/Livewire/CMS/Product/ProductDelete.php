<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\CMS\Component;
use App\Models\Product;
use App\Services\ProductService;

class ProductDelete extends Component
{
    public function mount(Product $product)
    {
        (new ProductService())->delete(product: $product);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.product')." - {$product->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
