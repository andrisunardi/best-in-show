<?php

namespace App\Livewire\CMS\Store;

use App\Livewire\CMS\Component;
use App\Models\Store;
use App\Services\StoreService;

class StoreDelete extends Component
{
    public function mount(Store $store)
    {
        (new StoreService())->delete(store: $store);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.store')." - {$store->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
