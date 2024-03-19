<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Services\ArticleService;

class ArticleAddPage extends Component
{
    public $title;

    public $title_idn;

    public $description;

    public $description_idn;

    public $date;

    public $image;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'title',
            'title_idn',
            'description',
            'description_idn',
            'date',
            'image',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:100|unique:articles,title',
            'title_idn' => 'required|string|max:100|unique:articles,title_idn',
            'description' => 'nullable|string|max:65535',
            'description_idn' => 'nullable|string|max:65535',
            'date' => 'nullable|date|date_format:Y-m-d',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $article = (new ArticleService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.article')." - {$article->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.article.index');
    }

    public function render()
    {
        return view('livewire.cms.article.add');
    }
}
