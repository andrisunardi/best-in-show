<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Services\ArticleService;

class ArticleRestoreAll extends Component
{
    public function mount()
    {
        (new ArticleService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.article').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.article.trash');
    }
}
