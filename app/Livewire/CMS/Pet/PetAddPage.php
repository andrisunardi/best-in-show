<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Services\PetService;

class PetAddPage extends Component
{
    public $name;

    public $name_idn;

    public $image;

    public $product_image;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'name',
            'name_idn',
            'image',
            'product_image',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:pets,name',
            'name_idn' => 'required|string|max:100|unique:pets,name_idn',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'product_image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $pet = (new PetService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.pet')." - {$pet->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.pet.index');
    }

    public function render()
    {
        return view('livewire.cms.pet.add');
    }
}
