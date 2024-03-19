<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Models\Article;

class ArticleViewPage extends Component
{
    public $article;

    public function mount($article)
    {
        $this->article = Article::withTrashed()->findOrFail($article);
    }

    public function render()
    {
        return view('livewire.cms.article.view');
    }
}
