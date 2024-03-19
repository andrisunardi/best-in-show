<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleClonePage extends Component
{
    public $article;

    public $title;

    public $title_idn;

    public $description;

    public $description_idn;

    public $date;

    public $image;

    public $is_active = true;

    public function mount(Article $article)
    {
        $this->title = "{$article->title} (Copy)";
        $this->title_idn = "{$article->title_idn} (Copy)";
        $this->description = $article->description;
        $this->description_idn = $article->description_idn;
        $this->date = $article->date?->format('Y-m-d');
        $this->is_active = $article->is_active;
    }

    public function resetFields()
    {
        $this->title = "{$this->article->title} (Copy)";
        $this->title_idn = "{$this->article->title_idn} (Copy)";
        $this->description = $this->article->description;
        $this->description_idn = $this->article->description_idn;
        $this->date = $this->article->date?->format('Y-m-d');
        $this->is_active = $this->article->is_active;
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
        $article = (new ArticleService())->clone(data: $this->validate(), article: $this->article);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.article')." - {$article->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.article.index');
    }

    public function render()
    {
        return view('livewire.cms.article.clone');
    }
}
