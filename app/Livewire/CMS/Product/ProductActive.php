<?php

namespace App\Livewire\CMS\Product;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Product;
use App\Services\ProductService;

class ProductActive extends Component
{
    public function mount(Product $product)
    {
        (new ProductService())->active(product: $product);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.product')." - {$product->id} - ".Utils::translate(Utils::active($product->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
