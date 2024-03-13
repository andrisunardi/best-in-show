<?php

namespace App\Livewire\Article;

use App\Livewire\Component;
use App\Models\Article;

class ArticleViewPage extends Component
{
    public $article;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->active()->firstOrFail();
    }

    public function getRelatedArticles()
    {
        return Article::where('id', '!=', $this->article->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();
    }

    public function render()
    {
        return view('livewire.article.view', [
            'relatedArticles' => $this->getRelatedArticles(),
        ]);
    }
}
