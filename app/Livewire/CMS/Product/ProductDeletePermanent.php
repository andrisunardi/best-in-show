<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\CMS\Component;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Str;

class ProductDeletePermanent extends Component
{
    public function mount($product)
    {
        $product = Product::onlyTrashed()->findOrFail($product);

        (new ProductService())->deletePermanent(product: $product);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.product')." - {$product->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.product.trash');
        }

        return redirect()->route('cms.product.index');
    }
}
