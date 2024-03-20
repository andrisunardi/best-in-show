<?php

namespace App\Livewire\CMS\EventImage;

use App\Livewire\CMS\Component;
use App\Services\EventImageService;

class EventImageDeletePermanentAll extends Component
{
    public function mount()
    {
        (new EventImageService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.eventImage').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.eventImage.trash');
    }
}
