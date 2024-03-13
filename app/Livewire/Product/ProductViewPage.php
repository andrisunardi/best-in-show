<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Models\Product;

class ProductViewPage extends Component
{
    public $product;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->active()->firstOrFail();
    }

    public function getOtherProducts()
    {
        return Product::where('id', '!=', $this->product->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();
    }

    public function render()
    {
        return view('livewire.product.view', [
            'otherProducts' => $this->getOtherProducts(),
        ]);
    }
}
