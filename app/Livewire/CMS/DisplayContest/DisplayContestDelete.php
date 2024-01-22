<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Models\DisplayContest;
use App\Services\DisplayContestService;

class DisplayContestDelete extends Component
{
    public function mount(DisplayContest $displayContest)
    {
        (new DisplayContestService())->delete(displayContest: $displayContest);

        $this->flash(
            'success',
            trans('index.displayContest')." - {$displayContest->id} - ".trans('index.deleted'),
        );

        return redirect(url()->previous());
    }
}
