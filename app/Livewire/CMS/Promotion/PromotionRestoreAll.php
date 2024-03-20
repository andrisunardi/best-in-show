<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Services\PromotionService;

class PromotionRestoreAll extends Component
{
    public function mount()
    {
        (new PromotionService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.promotion').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.promotion.trash');
    }
}
