<?php

namespace App\Livewire\CMS\Store;

use App\Enums\StoreCategory;
use App\Livewire\CMS\Component;
use App\Models\Store;
use App\Services\StoreService;
use Illuminate\Validation\Rules\Enum;

class StoreClonePage extends Component
{
    public $store;

    public $category;

    public $name;

    public $address;

    public $google_maps_iframe;

    public $google_maps;

    public $is_active = true;

    public function mount(Store $store)
    {
        $this->category = $store->category?->value;
        $this->name = $store->name;
        $this->address = $store->address;
        $this->google_maps_iframe = $store->google_maps_iframe;
        $this->google_maps = $store->google_maps;
        $this->is_active = $store->is_active;
    }

    public function resetFields()
    {
        $this->category = $this->store->category?->value;
        $this->name = $this->store->name;
        $this->address = $this->store->address;
        $this->google_maps_iframe = $this->store->google_maps_iframe;
        $this->google_maps = $this->store->google_maps;
        $this->is_active = $this->store->is_active;
    }

    public function rules()
    {
        return [
            'category' => ['required', 'integer', new Enum(StoreCategory::class)],
            'name' => 'required|string|max:100',
            'address' => 'nullable|string|max:1000',
            'google_maps_iframe' => 'nullable|string|max:300',
            'google_maps' => 'nullable|string|max:1000',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $store = (new StoreService())->clone(data: $this->validate(), store: $this->store);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.store')." - {$store->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.store.index');
    }

    public function getStoreCategories()
    {
        return StoreCategory::cases();
    }

    public function render()
    {
        return view('livewire.cms.store.clone', [
            'storeCategories' => $this->getStoreCategories(),
        ]);
    }
}
