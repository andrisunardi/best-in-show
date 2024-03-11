<?php

namespace App\Livewire\Promotion;

use App\Models\Promotion;
use App\Livewire\Component;

class PromotionViewPage extends Component
{
    public $promotion;

    public function mount($slug)
    {
        $this->promotion = Promotion::where('slug', $slug)->active()->firstOrFail();
    }

    public function getRelatedPromotions()
    {
        return Promotion::where('id', '!=', $this->promotion->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();
    }

    public function render()
    {
        return view('livewire.promotion.view', [
            'relatedPromotions' => $this->getRelatedPromotions(),
        ]);
    }
}
