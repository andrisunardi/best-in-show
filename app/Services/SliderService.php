<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Slider;

class SliderService
{
    public function index(
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $galleries = Slider::query()
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $galleries->paginate($per_page);
        }

        return $galleries->get();
    }

    public function add(array $data = []): Slider
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: null,
            disk: 'images',
            directory: 'slider',
            deleteAsset: false,
        );

        return Slider::create($data);
    }

    public function clone(array $data, Slider $slider): Slider
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: null,
            disk: 'images',
            directory: 'slider',
            checkAsset: $slider->checkImage(),
            fileAsset: $slider->image,
            deleteAsset: false,
        );

        return Slider::create($data);
    }

    public function edit(Slider $slider, array $data = []): Slider
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: null,
            disk: 'images',
            directory: 'slider',
            checkAsset: $slider->checkImage(),
            fileAsset: $slider->image,
            deleteAsset: true,
        );

        $slider->update($data);
        $slider->refresh();

        return $slider;
    }

    public function active(Slider $slider): Slider
    {
        $slider->is_active = ! $slider->is_active;
        $slider->save();
        $slider->refresh();

        return $slider;
    }

    public function deleteImage(Slider $slider)
    {
        $slider->deleteImage();

        $slider->image = null;
        $slider->save();
        $slider->refresh();

        return $slider;
    }

    public function delete(Slider $slider): bool
    {
        return $slider->delete();
    }

    public function deleteAll(array $galleries = []): bool
    {
        return Slider::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->delete();
    }

    public function restore(Slider $slider): bool
    {
        return $slider->restore();
    }

    public function restoreAll(array $galleries = []): bool
    {
        return Slider::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->restore();
    }

    public function deletePermanent(Slider $slider): bool
    {
        $slider->deleteImage();

        return $slider->forceDelete();
    }

    public function deletePermanentAll(array $galleries = []): bool
    {
        $galleries = Slider::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->get();

        foreach ($galleries as $slider) {
            $slider->deleteImage();
            $slider->forceDelete();
        }

        return true;
    }

    public function latest(): object
    {
        return Slider::with('category')->latest()->active()->limit(12)->get();
    }
}
