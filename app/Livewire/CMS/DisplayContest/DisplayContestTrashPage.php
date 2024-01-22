<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Services\DisplayContestService;

class DisplayContestTrashPage extends Component
{
    public $key = '';

    public $value = '';

    public $is_active = [];

    public $queryString = [
        'key',
        'value',
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
            'key',
            'value',
            'is_active',
        ]);
    }

    public function getDisplayContests()
    {
        return (new DisplayContestService())->index(
            key: $this->key,
            value: $this->value,
            is_active: $this->is_active,
            trash: true,
        );
    }

    public function render()
    {
        return view('livewire.cms.configuration.displayContest.trash', [
            'displayContests' => $this->getDisplayContests(),
        ]);
    }
}
