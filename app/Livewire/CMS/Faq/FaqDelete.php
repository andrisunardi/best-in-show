<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Models\Faq;
use App\Services\FaqService;

class FaqDelete extends Component
{
    public function mount(Faq $faq)
    {
        (new FaqService())->delete(faq: $faq);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.faq')." - {$faq->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
