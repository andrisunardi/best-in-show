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

    public function getProductColors()
    {
        return Product::where('pet_id', $this->product->pet->id)
            ->where('product_type_id', $this->product->type->id)
            ->where('product_category_id', $this->product->category->id)
            ->where('name', $this->product->name)
            ->where('variant', $this->product->variant)
            ->where('size', '!=', 'Product Category')
            ->whereNotNull('color')
            ->groupBy('color')
            ->orderByDesc('weight', 'variant')
            ->get();
    }

    public function getProductSizes()
    {
        return Product::where('pet_id', $this->product->pet->id)
            ->where('product_type_id', $this->product->type->id)
            ->where('product_category_id', $this->product->category->id)
            ->where('name', $this->product->name)
            ->where('variant', $this->product->variant)
            ->where('size', '!=', 'Product Category')
            ->groupBy('size')
            ->orderByDesc('weight', 'variant')
            ->get();
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
            'productColors' => $this->getProductColors(),
            'productSizes' => $this->getProductSizes(),
            'otherProducts' => $this->getOtherProducts(),
        ]);
    }
}
