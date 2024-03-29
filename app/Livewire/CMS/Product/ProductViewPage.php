<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\CMS\Component;
use App\Models\Product;

class ProductViewPage extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = Product::withTrashed()->findOrFail($product);
    }

    public function render()
    {
        return view('livewire.cms.product.view');
    }
}
