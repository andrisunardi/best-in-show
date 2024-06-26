<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Models\Promotion;
use App\Services\PromotionService;

class PromotionDeleteImage extends Component
{
    public function mount(Promotion $promotion)
    {
        (new PromotionService())->deleteImage(promotion: $promotion);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.promotion')." - {$promotion->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
