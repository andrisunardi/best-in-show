<?php

namespace App\Livewire\CMS\Store;

use App\Livewire\CMS\Component;
use App\Models\Store;

class StoreViewPage extends Component
{
    public $store;

    public function mount($store)
    {
        $this->store = Store::withTrashed()->findOrFail($store);
    }

    public function render()
    {
        return view('livewire.cms.store.view');
    }
}
