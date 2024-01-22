<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Models\DisplayContest;
use App\Services\DisplayContestService;

class DisplayContestRestore extends Component
{
    public function mount($displayContest)
    {
        $displayContest = DisplayContest::onlyTrashed()->findOrFail($displayContest);

        (new DisplayContestService())->restore(displayContest: $displayContest);

        $this->flash(
            'success',
            trans('index.displayContest')." - {$displayContest->id} - ".trans('index.restored'),
        );

        return redirect(url()->previous());
    }
}
