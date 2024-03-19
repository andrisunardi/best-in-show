<?php

namespace App\Livewire\CMS\Article;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleActive extends Component
{
    public function mount(Article $article)
    {
        (new ArticleService())->active(article: $article);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.article')." - {$article->id} - ".Utils::translate(Utils::active($article->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
