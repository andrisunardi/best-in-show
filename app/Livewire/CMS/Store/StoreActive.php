<?php

namespace App\Livewire\CMS\Store;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Store;
use App\Services\StoreService;

class StoreActive extends Component
{
    public function mount(Store $store)
    {
        (new StoreService())->active(store: $store);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.store')." - {$store->id} - ".Utils::translate(Utils::active($store->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
