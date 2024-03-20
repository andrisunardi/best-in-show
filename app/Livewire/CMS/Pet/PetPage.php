<?php

namespace App\Livewire\CMS\Pet;

use App\Livewire\CMS\Component;
use App\Services\PetService;

class PetPage extends Component
{
    public $name = '';

    public $name_idn = '';

    public $is_active = [];

    public $queryString = [
        'name',
        'name_idn',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'name',
            'name_idn',
            'is_active',
        ]);
    }

    public function getPets()
    {
        return (new PetService())->index(
            name: $this->name,
            name_idn: $this->name_idn,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.pet.index', [
            'pets' => $this->getPets(),
        ]);
    }
}
