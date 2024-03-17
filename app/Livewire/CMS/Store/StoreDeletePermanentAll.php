<?php

namespace App\Livewire\CMS\Store;

use App\Livewire\CMS\Component;
use App\Services\StoreService;

class StoreDeletePermanentAll extends Component
{
    public function mount()
    {
        (new StoreService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.store').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.store.trash');
    }
}
