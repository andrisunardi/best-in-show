<?php

namespace App\Livewire\Faq;

use App\Livewire\Component;
use App\Models\Faq;

class FaqPage extends Component
{
    public function getFaqs()
    {
        return Faq::latest()->active()->get();
    }

    public function render()
    {
        return view('livewire.faq.index', [
            'faqs' => $this->getFaqs(),
        ]);
    }
}
