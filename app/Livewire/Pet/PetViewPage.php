<?php

namespace App\Livewire\Pet;

use App\Models\Pet;
use App\Models\Product;
use App\Livewire\Component;

class PetViewPage extends Component
{
    public $search = '';

    public $page = 1;

    public $pet;

    public function mount($slug)
    {
        $this->pet = Pet::where('slug', $slug)->active()->firstOrFail();
    }

    protected $paginationTheme = 'tailwind';

    public $queryString = [
        'search',
        'page',
    ];

    public function getProducts()
    {
        return Product::when($this->search, function ($query) {
            $query->where('name', $this->search);
        })->where('pet_id', $this->pet->id)->latest()->active()->paginate(12);
    }

    public function render()
    {
        return view('livewire.pet.view', [
            'products' => $this->getProducts(),
        ]);
    }
}
