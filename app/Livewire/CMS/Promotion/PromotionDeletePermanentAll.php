<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Services\PromotionService;

class PromotionDeletePermanentAll extends Component
{
    public function mount()
    {
        (new PromotionService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.promotion').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.promotion.trash');
    }
}
