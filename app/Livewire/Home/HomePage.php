<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Models\Article;
use App\Models\Event;
use App\Models\Promotion;
use App\Services\PetService;

class HomePage extends Component
{
    public function getPets()
    {
        return (new PetService())->index(orderBy: 'id', sortBy: 'asc', paginate: false);
    }

    public function getLatestArticle()
    {
        return Article::latest()->first();
    }

    public function getLatestPromotion()
    {
        return Promotion::latest()->first();
    }

    public function getLatestEvents()
    {
        return Event::latest()->active()->get();
    }

    public function render()
    {
        return view('livewire.home.index', [
            'pets' => $this->getPets(),
            'latestArticle' => $this->getLatestArticle(),
            'latestPromotion' => $this->getLatestPromotion(),
            'latestEvents' => $this->getLatestEvents(),
        ]);
    }
}
