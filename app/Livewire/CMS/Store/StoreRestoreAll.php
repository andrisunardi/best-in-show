<?php

namespace App\Livewire\CMS\Store;

use App\Livewire\CMS\Component;
use App\Services\StoreService;

class StoreRestoreAll extends Component
{
    public function mount()
    {
        (new StoreService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.store').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.store.trash');
    }
}
