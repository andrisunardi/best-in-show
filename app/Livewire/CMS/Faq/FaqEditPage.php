<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\CMS\Component;
use App\Models\Faq;
use App\Services\FaqService;

class FaqEditPage extends Component
{
    public $faq;

    public $question;

    public $question_idn;

    public $answer;

    public $answer_idn;

    public $is_active = true;

    public function mount(Faq $faq)
    {
        $this->question = $faq->question;
        $this->question_idn = $faq->question_idn;
        $this->answer = $faq->answer;
        $this->answer_idn = $faq->answer_idn;
        $this->is_active = $faq->is_active;
    }

    public function resetFields()
    {
        $this->question = $this->faq->question;
        $this->question_idn = $this->faq->question_idn;
        $this->answer = $this->faq->answer;
        $this->answer_idn = $this->faq->answer_idn;
        $this->is_active = $this->faq->is_active;
    }

    public function rules()
    {
        return [
            'question' => "required|string|max:100|unique:faqs,question,{$this->faq->id}",
            'question_idn' => "required|string|max:100|unique:faqs,question_idn,{$this->faq->id}",
            'answer' => 'nullable|string|max:65535',
            'answer_idn' => 'nullable|string|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $faq = (new FaqService())->edit(faq: $this->faq, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.faq')." - {$faq->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.faq.index');
    }

    public function render()
    {
        return view('livewire.cms.faq.edit');
    }
}
