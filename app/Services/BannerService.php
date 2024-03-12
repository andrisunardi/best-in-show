<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Banner;
use App\Models\Pet;

class BannerService
{
    public function index(
        string|int $pet_id = '',
        string $link = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $galleries = Banner::with('pet')
            ->when($pet_id, fn ($q) => $q->where('pet_id', $pet_id))
            ->when($link, fn ($q) => $q->where('link', 'LIKE', "%{$link}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $galleries->paginate($per_page);
        }

        return $galleries->get();
    }

    public function add(array $data = []): Banner
    {
        $pet = Pet::find($data['pet_id']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $pet->name,
            disk: 'images',
            directory: 'banner',
            deleteAsset: false,
        );

        return Banner::create($data);
    }

    public function clone(array $data, Banner $banner): Banner
    {
        $pet = Pet::find($data['pet_id']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $pet->name,
            disk: 'images',
            directory: 'banner',
            checkAsset: $banner->checkImage(),
            fileAsset: $banner->image,
            deleteAsset: false,
        );

        return Banner::create($data);
    }

    public function edit(Banner $banner, array $data = []): Banner
    {
        $pet = Pet::find($data['pet_id']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $pet->name,
            disk: 'images',
            directory: 'banner',
            checkAsset: $banner->checkImage(),
            fileAsset: $banner->image,
            deleteAsset: true,
        );

        $banner->update($data);
        $banner->refresh();

        return $banner;
    }

    public function active(Banner $banner): Banner
    {
        $banner->is_active = ! $banner->is_active;
        $banner->save();
        $banner->refresh();

        return $banner;
    }

    public function deleteImage(Banner $banner)
    {
        $banner->deleteImage();

        $banner->image = null;
        $banner->save();
        $banner->refresh();

        return $banner;
    }

    public function delete(Banner $banner): bool
    {
        return $banner->delete();
    }

    public function deleteAll(array $galleries = []): bool
    {
        return Banner::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->delete();
    }

    public function restore(Banner $banner): bool
    {
        return $banner->restore();
    }

    public function restoreAll(array $galleries = []): bool
    {
        return Banner::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->restore();
    }

    public function deletePermanent(Banner $banner): bool
    {
        $banner->deleteImage();

        return $banner->forceDelete();
    }

    public function deletePermanentAll(array $galleries = []): bool
    {
        $galleries = Banner::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->get();

        foreach ($galleries as $banner) {
            $banner->deleteImage();
            $banner->forceDelete();
        }

        return true;
    }

    public function latest(): object
    {
        return Banner::with('category')->latest()->active()->limit(12)->get();
    }
}
