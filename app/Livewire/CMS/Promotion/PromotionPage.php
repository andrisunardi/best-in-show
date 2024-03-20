<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Services\PromotionService;

class PromotionPage extends Component
{
    public $name = '';

    public $name_idn = '';

    public $description = '';

    public $description_idn = '';

    public $date = '';

    public $is_active = [];

    public $queryString = [
        'name',
        'name_idn',
        'description',
        'description_idn',
        'date',
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
            'description',
            'description_idn',
            'date',
            'is_active',
        ]);
    }

    public function getPromotions()
    {
        return (new PromotionService())->index(
            name: $this->name,
            name_idn: $this->name_idn,
            description: $this->description,
            description_idn: $this->description_idn,
            date: $this->date,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.promotion.index', [
            'promotions' => $this->getPromotions(),
        ]);
    }
}
