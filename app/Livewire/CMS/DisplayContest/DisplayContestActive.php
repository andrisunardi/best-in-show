<?php

namespace App\Livewire\CMS\DisplayContest;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\DisplayContest;
use App\Services\DisplayContestService;

class DisplayContestActive extends Component
{
    public function mount(DisplayContest $setting)
    {
        (new DisplayContestService())->active(setting: $setting);

        $this->flash(
            'success',
            trans('index.setting')." - {$setting->id} - ".Utils::translate(Utils::active($setting->is_active)),
        );

        return redirect(url()->previous());
    }
}
