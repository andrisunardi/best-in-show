<?php

namespace App\Livewire\CMS\Store;

use App\Enums\StoreCategory;
use App\Livewire\CMS\Component;
use App\Services\StoreService;
use Illuminate\Validation\Rules\Enum;

class StoreAddPage extends Component
{
    public $category;

    public $name;

    public $address;

    public $google_maps_iframe;

    public $google_maps;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'category',
            'name',
            'address',
            'google_maps_iframe',
            'google_maps',
            'is_active',
        ]);
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
        $store = (new StoreService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.store')." - {$store->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.store.index');
    }

    public function getStoreCategories()
    {
        return StoreCategory::cases();
    }

    public function render()
    {
        return view('livewire.cms.store.add', [
            'storeCategories' => $this->getStoreCategories(),
        ]);
    }
}
