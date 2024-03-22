<?php

namespace App\Livewire\CMS\ProductType;

use App\Livewire\CMS\Component;
use App\Services\PetService;
use App\Services\ProductTypeService;

class ProductTypeAddPage extends Component
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
            'name' => 'required|string|max:100|unique:product_types,name',
            'name_idn' => 'required|string|max:100|unique:product_types,name_idn',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $productType = (new ProductTypeService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.product_type')." - {$productType->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.product-type.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.product-type.add', [
            'pets' => $this->getPets(),
        ]);
    }
}
