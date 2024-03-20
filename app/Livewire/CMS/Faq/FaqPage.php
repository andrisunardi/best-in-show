<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Services\FaqService;

class FaqPage extends Component
{
    public $question = '';

    public $question_idn = '';

    public $answer = '';

    public $answer_idn = '';

    public $is_active = [];

    public $queryString = [
        'question',
        'question_idn',
        'answer',
        'answer_idn',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'question',
            'question_idn',
            'answer',
            'answer_idn',
            'is_active',
        ]);
    }

    public function getFaqs()
    {
        return (new FaqService())->index(
            question: $this->question,
            question_idn: $this->question_idn,
            answer: $this->answer,
            answer_idn: $this->answer_idn,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.faq.index', [
            'faqs' => $this->getFaqs(),
        ]);
    }
}
