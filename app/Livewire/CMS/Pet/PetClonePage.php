<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Models\Pet;
use App\Services\PetService;

class PetClonePage extends Component
{
    public $pet;

    public $name;

    public $name_idn;

    public $image;

    public $product_image;

    public $is_active = true;

    public function mount(Pet $pet)
    {
        $this->name = "{$pet->name} (Copy)";
        $this->name_idn = "{$pet->name_idn} (Copy)";
        $this->is_active = $pet->is_active;
    }

    public function resetFields()
    {
        $this->name = "{$this->pet->name} (Copy)";
        $this->name_idn = "{$this->pet->name_idn} (Copy)";
        $this->is_active = $this->pet->is_active;
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
        $pet = (new PetService())->clone(data: $this->validate(), pet: $this->pet);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.pet')." - {$pet->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.pet.index');
    }

    public function render()
    {
        return view('livewire.cms.pet.clone');
    }
}
