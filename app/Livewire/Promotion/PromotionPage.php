<?php

namespace App\Livewire\Promotion;

use App\Livewire\Component;
use App\Models\Promotion;

class PromotionPage extends Component
{
    public function getPromotions()
    {
        return Promotion::latest()->active()->get();
    }

    public function render()
    {
        return view('livewire.promotion.index', [
            'promotions' => $this->getPromotions(),
        ]);
    }
}
