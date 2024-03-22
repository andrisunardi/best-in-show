<?php

namespace App\Livewire\CMS\ProductType;

use App\Livewire\CMS\Component;
use App\Models\ProductType;
use App\Services\PetService;
use App\Services\ProductTypeService;

class ProductTypeClonePage extends Component
{
    public $productType;

    public $pet_id;

    public $name;

    public $name_idn;

    public $image;

    public $is_active = true;

    public function mount(ProductType $productType)
    {
        $this->pet_id = $productType->pet_id;
        $this->name = "{$productType->name} (Copy)";
        $this->name_idn = "{$productType->name_idn} (Copy)";
        $this->is_active = $productType->is_active;
    }

    public function resetFields()
    {
        $this->pet_id = $this->productType->pet_id;
        $this->name = "{$this->productType->name} (Copy)";
        $this->name_idn = "{$this->productType->name_idn} (Copy)";
        $this->is_active = $this->productType->is_active;
    }

    public function rules()
    {
        return [
            'pet_id' => 'required|integer|exists:pets,id',
            'name' => 'required|string|max:100|unique:product_types,name',
            'name_idn' => 'required|string|max:100|unique:product_types,name_idn',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $productType = (new ProductTypeService())->clone(data: $this->validate(), productType: $this->productType);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.product_type')." - {$productType->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.product-type.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.product-type.clone', [
            'pets' => $this->getPets(),
        ]);
    }
}
