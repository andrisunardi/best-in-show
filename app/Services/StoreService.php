<?php

namespace App\Services;

use App\Models\Store;

class StoreService
{
    public function index(
        string|int|null $category = '',
        string $name = '',
        string $address = '',
        string $google_maps_iframe = '',
        string $google_maps = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $stores = Store::query()
            ->when($category, fn ($q) => $q->where('category', $category))
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($address, fn ($q) => $q->where('address', 'LIKE', "%{$address}%"))
            ->when($google_maps_iframe, fn ($q) => $q->where('google_maps_iframe', 'LIKE', "%{$google_maps_iframe}%"))
            ->when($google_maps, fn ($q) => $q->where('google_maps', 'LIKE', "%{$google_maps}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $stores->paginate($per_page);
        }

        return $stores->get();
    }

    public function add(array $data = []): Store
    {
        return Store::create($data);
    }

    public function clone(array $data, Store $store): Store
    {
        return Store::create($data);
    }

    public function edit(Store $store, array $data = []): Store
    {
        $store->update($data);
        $store->refresh();

        return $store;
    }

    public function active(Store $store): Store
    {
        $store->is_active = ! $store->is_active;
        $store->save();
        $store->refresh();

        return $store;
    }

    public function delete(Store $store): bool
    {
        return $store->delete();
    }

    public function deleteAll(array $stores = []): bool
    {
        return Store::when($stores, fn ($q) => $q->whereIn('id', $stores))->delete();
    }

    public function restore(Store $store): bool
    {
        return $store->restore();
    }

    public function restoreAll(array $stores = []): bool
    {
        return Store::when($stores, fn ($q) => $q->whereIn('id', $stores))->onlyTrashed()->restore();
    }

    public function deletePermanent(Store $store): bool
    {
        return $store->forceDelete();
    }

    public function deletePermanentAll(array $stores = []): bool
    {
        return Store::when($stores, fn ($q) => $q->whereIn('id', $stores))->onlyTrashed()->forceDelete();
    }
}
