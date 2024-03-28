<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\CMS\Component;
use App\Services\PetService;
use App\Services\ProductCategoryService;

class ProductCategoryAddPage extends Component
{
    public $pet_id;

    public $name;

    public $name_idn;

    public $image;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'pet_id',
            'name',
            'name_idn',
            'image',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'pet_id' => 'required|integer|exists:pets,id',
            'name' => 'required|string|max:100|unique:product_categories,name',
            'name_idn' => 'required|string|max:100|unique:product_categories,name_idn',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $productCategory = (new ProductCategoryService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.product_category')." - {$productCategory->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.product-category.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.product-category.add', [
            'pets' => $this->getPets(),
        ]);
    }
}
