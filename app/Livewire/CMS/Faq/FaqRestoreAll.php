<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Services\FaqService;

class FaqRestoreAll extends Component
{
    public function mount()
    {
        (new FaqService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.faq').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.faq.trash');
    }
}
