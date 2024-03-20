<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Promotion;
use Illuminate\Support\Str;

class PromotionService
{
    public function index(
        string $name = '',
        string $name_idn = '',
        string $description = '',
        string $description_idn = '',
        string $date = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $promotions = Promotion::query()
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($name_idn, fn ($q) => $q->where('name_idn', 'LIKE', "%{$name_idn}%"))
            ->when($description, fn ($q) => $q->where('description', 'LIKE', "%{$description}%"))
            ->when($description_idn, fn ($q) => $q->where('description_idn', 'LIKE', "%{$description_idn}%"))
            ->when($date, fn ($q) => $q->whereDate('date', $date))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $promotions->paginate($per_page);
        }

        return $promotions->get();
    }

    public function add(array $data = []): Promotion
    {
        $data['date'] = $data['date'] ?: null;

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'promotion',
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        return Promotion::create($data);
    }

    public function clone(array $data, Promotion $promotion): Promotion
    {
        $data['date'] = $data['date'] ?: null;

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'promotion',
            checkAsset: $promotion->checkImage(),
            fileAsset: $promotion->image,
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        return Promotion::create($data);
    }

    public function edit(Promotion $promotion, array $data = []): Promotion
    {
        $data['date'] = $data['date'] ?: null;

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'promotion',
            checkAsset: $promotion->checkImage(),
            fileAsset: $promotion->image,
            deleteAsset: true,
        );

        $data['slug'] = Str::slug($data['name']);

        $promotion->update($data);
        $promotion->refresh();

        return $promotion;
    }

    public function active(Promotion $promotion): Promotion
    {
        $promotion->is_active = ! $promotion->is_active;
        $promotion->save();
        $promotion->refresh();

        return $promotion;
    }

    public function deleteImage(Promotion $promotion)
    {
        $promotion->deleteImage();

        $promotion->image = null;
        $promotion->save();
        $promotion->refresh();

        return $promotion;
    }

    public function delete(Promotion $promotion): bool
    {
        return $promotion->delete();
    }

    public function deleteAll(array $promotions = []): bool
    {
        return Promotion::when($promotions, fn ($q) => $q->whereIn('id', $promotions))->delete();
    }

    public function restore(Promotion $promotion): bool
    {
        return $promotion->restore();
    }

    public function restoreAll(array $promotions = []): bool
    {
        return Promotion::when($promotions, fn ($q) => $q->whereIn('id', $promotions))->onlyTrashed()->restore();
    }

    public function deletePermanent(Promotion $promotion): bool
    {
        $promotion->deleteImage();

        return $promotion->forceDelete();
    }

    public function deletePermanentAll(array $promotions = []): bool
    {
        $promotions = Promotion::when($promotions, fn ($q) => $q->whereIn('id', $promotions))->onlyTrashed()->get();

        foreach ($promotions as $promotion) {
            $promotion->deleteImage();
            $promotion->forceDelete();
        }

        return true;
    }

    public function latest(): object
    {
        return Promotion::with('category')->latest()->active()->limit(3)->get();
    }
}
