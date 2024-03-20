<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Models\Faq;
use App\Services\FaqService;

class FaqRestore extends Component
{
    public function mount($faq)
    {
        $faq = Faq::onlyTrashed()->findOrFail($faq);

        (new FaqService())->restore(faq: $faq);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.faq')." - {$faq->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
