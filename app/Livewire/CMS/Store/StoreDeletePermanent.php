<?php

namespace App\Livewire\CMS\Store;

use App\Livewire\CMS\Component;
use App\Models\Store;
use App\Services\StoreService;
use Illuminate\Support\Str;

class StoreDeletePermanent extends Component
{
    public function mount($store)
    {
        $store = Store::onlyTrashed()->findOrFail($store);

        (new StoreService())->deletePermanent(store: $store);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.store')." - {$store->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.store.trash');
        }

        return redirect()->route('cms.store.index');
    }
}
