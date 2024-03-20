<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Services\EventImageService;

class EventImageRestoreAll extends Component
{
    public function mount()
    {
        (new EventImageService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.eventImage').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.eventImage.trash');
    }
}
