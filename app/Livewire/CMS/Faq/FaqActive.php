<?php

namespace App\Livewire\CMS\Faq;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Faq;
use App\Services\FaqService;

class FaqActive extends Component
{
    public function mount(Faq $faq)
    {
        (new FaqService())->active(faq: $faq);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.faq')." - {$faq->id} - ".Utils::translate(Utils::active($faq->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
