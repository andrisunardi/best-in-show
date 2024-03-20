<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\CMS\Component;
use App\Services\EventService;

class EventDeletePermanentAll extends Component
{
    public function mount()
    {
        (new EventService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.event').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.event.trash');
    }
}
