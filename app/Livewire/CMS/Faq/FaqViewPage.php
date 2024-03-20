<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Models\Faq;

class FaqViewPage extends Component
{
    public $faq;

    public function mount($faq)
    {
        $this->faq = Faq::withTrashed()->findOrFail($faq);
    }

    public function render()
    {
        return view('livewire.cms.faq.view');
    }
}
