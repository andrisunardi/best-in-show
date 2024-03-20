<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Models\Promotion;

class PromotionViewPage extends Component
{
    public $promotion;

    public function mount($promotion)
    {
        $this->promotion = Promotion::withTrashed()->findOrFail($promotion);
    }

    public function render()
    {
        return view('livewire.cms.promotion.view');
    }
}
