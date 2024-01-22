<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Services\DisplayContestService;

class DisplayContestDeletePermanentAll extends Component
{
    public function mount()
    {
        (new DisplayContestService())->deletePermanentAll();

        $this->flash(
            'success',
            trans('index.all').' - '.trans('index.displayContest').' - '.trans('index.deleted_permanently'),
        );

        return redirect()->route('cms.configuration.displayContest.trash');
    }
}
