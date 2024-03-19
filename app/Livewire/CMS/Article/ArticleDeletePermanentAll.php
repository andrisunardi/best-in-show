<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Services\ArticleService;

class ArticleDeletePermanentAll extends Component
{
    public function mount()
    {
        (new ArticleService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.article').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.article.trash');
    }
}
