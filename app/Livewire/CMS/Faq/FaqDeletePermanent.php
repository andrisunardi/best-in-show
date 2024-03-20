<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Models\Faq;
use App\Services\FaqService;
use Illuminate\Support\Str;

class FaqDeletePermanent extends Component
{
    public function mount($faq)
    {
        $faq = Faq::onlyTrashed()->findOrFail($faq);

        (new FaqService())->deletePermanent(faq: $faq);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.faq')." - {$faq->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.faq.trash');
        }

        return redirect()->route('cms.faq.index');
    }
}
