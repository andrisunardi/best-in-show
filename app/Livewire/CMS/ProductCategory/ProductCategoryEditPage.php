<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Models\ProductCategory;
use App\Services\PetService;
use App\Services\ProductCategoryService;

class ProductCategoryEditPage extends Component
{
    public $productCategory;

    public $pet_id;

    public $name;

    public $name_idn;

    public $image;

    public $image_mobile;

    public $is_active = true;

    public function mount(ProductCategory $productCategory)
    {
        $this->pet_id = $productCategory->pet_id;
        $this->name = $productCategory->name;
        $this->name_idn = $productCategory->name_idn;
        $this->is_active = $productCategory->is_active;
    }

    public function resetFields()
    {
        $this->pet_id = $this->productCategory->pet_id;
        $this->name = $this->productCategory->name;
        $this->name_idn = $this->productCategory->name_idn;
        $this->is_active = $this->productCategory->is_active;
    }

    public function rules()
    {
        return [
            'pet_id' => 'required|integer|exists:pets,id',
            'name' => "required|string|max:100|unique:product_categories,name,{$this->productCategory->id}",
            'name_idn' => "required|string|max:100|unique:product_categories,name_idn,{$this->productCategory->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $productCategory = (new ProductCategoryService())->edit(productCategory: $this->productCategory, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.product_category')." - {$productCategory->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.product-category.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.product-category.edit', [
            'pets' => $this->getPets(),
        ]);
    }
}
