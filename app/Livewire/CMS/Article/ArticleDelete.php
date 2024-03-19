<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleDelete extends Component
{
    public function mount(Article $article)
    {
        (new ArticleService())->delete(article: $article);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.article')." - {$article->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
