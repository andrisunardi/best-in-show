<?php

namespace App\Livewire\Article;

use App\Livewire\Component;
use App\Models\Article;

class ArticlePage extends Component
{
    public function getLatestArticle()
    {
        return Article::latest()->active()->first();
    }

    public function getArticles()
    {
        return Article::latest()->active()->skip(1)->take(9)->get();
    }

    public function render()
    {
        return view('livewire.article.index', [
            'latestArticle' => $this->getLatestArticle(),
            'articles' => $this->getArticles(),
        ]);
    }
}
