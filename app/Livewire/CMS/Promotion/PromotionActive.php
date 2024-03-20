<?php

namespace App\Livewire\CMS\Promotion;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Promotion;
use App\Services\PromotionService;

class PromotionActive extends Component
{
    public function mount(Promotion $promotion)
    {
        (new PromotionService())->active(promotion: $promotion);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.promotion')." - {$promotion->id} - ".Utils::translate(Utils::active($promotion->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
