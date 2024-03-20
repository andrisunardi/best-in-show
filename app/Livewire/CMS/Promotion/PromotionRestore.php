<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Models\Promotion;
use App\Services\PromotionService;

class PromotionRestore extends Component
{
    public function mount($promotion)
    {
        $promotion = Promotion::onlyTrashed()->findOrFail($promotion);

        (new PromotionService())->restore(promotion: $promotion);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.promotion')." - {$promotion->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
