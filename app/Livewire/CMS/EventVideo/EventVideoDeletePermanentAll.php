<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Services\EventVideoService;

class EventVideoDeletePermanentAll extends Component
{
    public function mount()
    {
        (new EventVideoService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.event_video').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.event-video.trash');
    }
}
