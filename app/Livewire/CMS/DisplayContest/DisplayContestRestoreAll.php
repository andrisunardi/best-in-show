<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Services\DisplayContestService;

class DisplayContestRestoreAll extends Component
{
    public function mount()
    {
        (new DisplayContestService())->restoreAll();

        $this->flash(
            'success',
            trans('index.all').' - '.trans('index.displayContest').' - '.trans('index.restored'),
        );

        return redirect()->route('cms.configuration.displayContest.trash');
    }
}
