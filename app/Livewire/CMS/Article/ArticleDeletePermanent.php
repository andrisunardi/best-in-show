<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Support\Str;

class ArticleDeletePermanent extends Component
{
    public function mount($article)
    {
        $article = Article::onlyTrashed()->findOrFail($article);

        (new ArticleService())->deletePermanent(article: $article);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.article')." - {$article->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.article.trash');
        }

        return redirect()->route('cms.article.index');
    }
}
