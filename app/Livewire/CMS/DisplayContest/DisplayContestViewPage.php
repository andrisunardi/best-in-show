<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Models\DisplayContest;

class DisplayContestViewPage extends Component
{
    public $displayContest;

    public function mount($displayContest)
    {
        $this->displayContest = DisplayContest::withTrashed()->findOrFail($displayContest);
    }

    public function render()
    {
        return view('livewire.cms.display-contest.view');
    }
}
