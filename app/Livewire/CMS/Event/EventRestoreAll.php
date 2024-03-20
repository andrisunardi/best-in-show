<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Services\EventService;

class EventRestoreAll extends Component
{
    public function mount()
    {
        (new EventService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.event').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.event.trash');
    }
}
