<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Models\Promotion;
use App\Services\PromotionService;
use Illuminate\Support\Str;

class PromotionDeletePermanent extends Component
{
    public function mount($promotion)
    {
        $promotion = Promotion::onlyTrashed()->findOrFail($promotion);

        (new PromotionService())->deletePermanent(promotion: $promotion);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.promotion')." - {$promotion->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.promotion.trash');
        }

        return redirect()->route('cms.promotion.index');
    }
}
