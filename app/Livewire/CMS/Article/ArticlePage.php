<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\CMS\Component;
use App\Services\ArticleService;

class ArticlePage extends Component
{
    public $title = '';

    public $title_idn = '';

    public $description = '';

    public $description_idn = '';

    public $date = '';

    public $is_active = [];

    public $queryString = [
        'title',
        'title_idn',
        'description',
        'description_idn',
        'date',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'title',
            'title_idn',
            'description',
            'description_idn',
            'date',
            'is_active',
        ]);
    }

    public function getArticles()
    {
        return (new ArticleService())->index(
            title: $this->title,
            title_idn: $this->title_idn,
            description: $this->description,
            description_idn: $this->description_idn,
            date: $this->date,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.article.index', [
            'articles' => $this->getArticles(),
        ]);
    }
}
