<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public function index(
        string $key = '',
        string $value = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $settings = Setting::query()
            ->when($key, fn ($q) => $q->where('key', 'LIKE', "%{$key}%"))
            ->when($value, fn ($q) => $q->where('value', 'LIKE', "%{$value}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $settings->paginate($per_page);
        }

        return $settings->get();
    }

    public function add(array $data = []): Setting
    {
        return Setting::create($data);
    }

    public function clone(array $data, Setting $setting): Setting
    {
        return Setting::create($data);
    }

    public function edit(Setting $setting, $data): Setting
    {
        $setting->update($data);
        $setting->refresh();

        return $setting;
    }

    public function active(Setting $setting): Setting
    {
        $setting->is_active = ! $setting->is_active;
        $setting->save();
        $setting->refresh();

        return $setting;
    }

    public function delete(Setting $setting): bool
    {
        return $setting->delete();
    }

    public function deleteAll(array $settings = []): bool
    {
        return Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->delete();
    }

    public function restore(Setting $setting): bool
    {
        return $setting->restore();
    }

    public function restoreAll(array $settings = []): bool
    {
        return Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->onlyTrashed()->restore();
    }

    public function deletePermanent(Setting $setting): bool
    {
        return $setting->forceDelete();
    }

    public function deletePermanentAll(array $settings = []): bool
    {
        return Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->onlyTrashed()->forceDelete();
    }
}
