<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Services\FaqService;

class FaqAddPage extends Component
{
    public $question;

    public $question_idn;

    public $answer;

    public $answer_idn;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'question',
            'question_idn',
            'answer',
            'answer_idn',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'question' => 'required|string|max:100|unique:faqs,question',
            'question_idn' => 'required|string|max:100|unique:faqs,question_idn',
            'answer' => 'nullable|string|max:65535',
            'answer_idn' => 'nullable|string|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $faq = (new FaqService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.faq')." - {$faq->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.faq.index');
    }

    public function render()
    {
        return view('livewire.cms.faq.add');
    }
}
