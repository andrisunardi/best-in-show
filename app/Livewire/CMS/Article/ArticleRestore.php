<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleRestore extends Component
{
    public function mount($article)
    {
        $article = Article::onlyTrashed()->findOrFail($article);

        (new ArticleService())->restore(article: $article);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.article')." - {$article->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
