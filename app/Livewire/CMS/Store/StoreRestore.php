<?php

namespace App\Livewire\CMS\Store;

use App\Livewire\CMS\Component;
use App\Models\Store;
use App\Services\StoreService;

class StoreRestore extends Component
{
    public function mount($store)
    {
        $store = Store::onlyTrashed()->findOrFail($store);

        (new StoreService())->restore(store: $store);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.store')." - {$store->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
