<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\CMS\Component;
use App\Models\Product;
use App\Services\PetService;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use App\Services\ProductTypeService;

class ProductClonePage extends Component
{
    public $product;

    public $pet_id;

    public $product_type_id;

    public $product_category_id;

    public $name;

    public $name_idn;

    public $description;

    public $description_idn;

    public $variant;

    public $variant_idn;

    public $size;

    public $weight;

    public $color;

    public $blibli;

    public $lazada;

    public $shopee;

    public $tokopedia;

    public $image;

    public $is_active = true;

    public function mount(Product $product)
    {
        $this->pet_id = $product->pet_id;
        $this->product_type_id = $product->product_type_id;
        $this->product_category_id = $product->product_category_id;
        $this->name = "{$product->name} (Copy)";
        $this->name_idn = "{$product->name_idn} (Copy)";
        $this->description = $product->description;
        $this->description_idn = $product->description_idn;
        $this->variant = $product->variant;
        $this->variant_idn = $product->variant_idn;
        $this->size = $product->size;
        $this->weight = $product->weight;
        $this->color = $product->color;
        $this->blibli = $product->blibli;
        $this->lazada = $product->lazada;
        $this->shopee = $product->shopee;
        $this->tokopedia = $product->tokopedia;
        $this->is_active = $product->is_active;
    }

    public function resetFields()
    {
        $this->pet_id = $this->product->pet_id;
        $this->product_type_id = $this->product->product_type_id;
        $this->product_category_id = $this->product->product_category_id;
        $this->name = "{$this->product->name} (Copy)";
        $this->name_idn = "{$this->product->name_idn} (Copy)";
        $this->description = $this->product->description;
        $this->description_idn = $this->product->description_idn;
        $this->variant = $this->product->variant;
        $this->variant_idn = $this->product->variant_idn;
        $this->size = $this->product->size;
        $this->weight = $this->product->weight;
        $this->color = $this->product->color;
        $this->blibli = $this->product->blibli;
        $this->lazada = $this->product->lazada;
        $this->shopee = $this->product->shopee;
        $this->tokopedia = $this->product->tokopedia;
        $this->is_active = $this->product->is_active;
    }

    public function rules()
    {
        return [
            'pet_id' => 'required|integer|exists:pets,id',
            'product_type_id' => 'required|integer|exists:product_types,id',
            'product_category_id' => 'required|integer|exists:product_categories,id',
            'name' => 'required|string|max:100|unique:products,name',
            'name_idn' => 'required|string|max:100|unique:products,name_idn',
            'description' => 'nullable|string|max:65535',
            'description_idn' => 'nullable|string|max:65535',
            'variant' => 'nullable|string|max:100',
            'variant_idn' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:100',
            'weight' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:100',
            'blibli' => 'nullable|active_url|max:100',
            'lazada' => 'nullable|active_url|max:100',
            'shopee' => 'nullable|active_url|max:100',
            'tokopedia' => 'nullable|active_url|max:100',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $product = (new ProductService())->clone(data: $this->validate(), product: $this->product);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.product')." - {$product->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.product.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function getProductTypes()
    {
        if (! $this->pet_id) {
            return collect();
        }

        return (new ProductTypeService())->index(
            pet_id: $this->pet_id,
            is_active: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getProductCategories()
    {
        if (! $this->product_type_id) {
            return collect();
        }

        return (new ProductCategoryService())->index(
            pet_id: $this->pet_id,
            product_type_id: $this->product_type_id,
            is_active: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.product.clone', [
            'pets' => $this->getPets(),
            'productTypes' => $this->getProductTypes(),
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
