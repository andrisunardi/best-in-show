<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Models\DisplayContest;
use App\Services\DisplayContestService;
use Illuminate\Support\Str;

class DisplayContestDeletePermanent extends Component
{
    public function mount($displayContest)
    {
        $displayContest = DisplayContest::onlyTrashed()->findOrFail($displayContest);

        (new DisplayContestService())->deletePermanent(displayContest: $displayContest);

        $this->flash(
            'success',
            trans('index.displayContest')." - {$displayContest->id} - ".trans('index.deleted_permanently'),
        );

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.configuration.displayContest.trash');
        }

        return redirect()->route('cms.configuration.displayContest.index');
    }
}
