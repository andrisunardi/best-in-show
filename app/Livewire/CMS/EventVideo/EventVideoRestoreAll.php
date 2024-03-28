<?php

namespace App\Livewire\CMS\EventVideo;

use App\Livewire\CMS\Component;
use App\Services\EventVideoService;

class EventVideoRestoreAll extends Component
{
    public function mount()
    {
        (new EventVideoService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.event_video').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.event-video.trash');
    }
}
