<?php

namespace App\Livewire\CMS\Store;

use App\Enums\StoreCategory;
use App\Livewire\CMS\Component;
use App\Services\StoreService;

class StorePage extends Component
{
    public $category = '';

    public $name = '';

    public $address = '';

    public $google_maps_iframe = '';

    public $google_maps = '';

    public $is_active = [];

    public $queryString = [
        'category',
        'name',
        'address',
        'google_maps_iframe',
        'google_maps',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'category',
            'name',
            'address',
            'google_maps_iframe',
            'google_maps',
            'is_active',
        ]);
    }

    public function getStoreCategories()
    {
        return StoreCategory::cases();
    }

    public function getStores()
    {
        return (new StoreService())->index(
            category: $this->category,
            name: $this->name,
            address: $this->address,
            google_maps_iframe: $this->google_maps_iframe,
            google_maps: $this->google_maps,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.store.index', [
            'storeCategories' => $this->getStoreCategories(),
            'stores' => $this->getStores(),
        ]);
    }
}
