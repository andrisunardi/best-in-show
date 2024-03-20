<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Services\FaqService;

class FaqDeletePermanentAll extends Component
{
    public function mount()
    {
        (new FaqService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.faq').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.faq.trash');
    }
}
