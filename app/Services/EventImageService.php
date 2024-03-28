<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Event;
use App\Models\EventImage;

class EventImageService
{
    public function index(
        string|int $event_id = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $galleries = EventImage::with('event')
            ->when($event_id, fn ($q) => $q->where('event_id', $event_id))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $galleries->paginate($per_page);
        }

        return $galleries->get();
    }

    public function add(array $data = []): EventImage
    {
        $event = Event::find($data['event_id']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $event->name,
            disk: 'images',
            directory: 'event/image',
            deleteAsset: false,
        );

        return EventImage::create($data);
    }

    public function clone(array $data, EventImage $eventImage): EventImage
    {
        $event = Event::find($data['event_id']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $event->name,
            disk: 'images',
            directory: 'event/image',
            checkAsset: $eventImage->checkImage(),
            fileAsset: $eventImage->image,
            deleteAsset: false,
        );

        return EventImage::create($data);
    }

    public function edit(EventImage $eventImage, array $data = []): EventImage
    {
        $event = Event::find($data['event_id']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $event->name,
            disk: 'images',
            directory: 'event/image',
            checkAsset: $eventImage->checkImage(),
            fileAsset: $eventImage->image,
            deleteAsset: true,
        );

        $eventImage->update($data);
        $eventImage->refresh();

        return $eventImage;
    }

    public function active(EventImage $eventImage): EventImage
    {
        $eventImage->is_active = ! $eventImage->is_active;
        $eventImage->save();
        $eventImage->refresh();

        return $eventImage;
    }

    public function deleteImage(EventImage $eventImage)
    {
        $eventImage->deleteImage();

        $eventImage->image = null;
        $eventImage->save();
        $eventImage->refresh();

        return $eventImage;
    }

    public function delete(EventImage $eventImage): bool
    {
        return $eventImage->delete();
    }

    public function deleteAll(array $galleries = []): bool
    {
        return EventImage::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->delete();
    }

    public function restore(EventImage $eventImage): bool
    {
        return $eventImage->restore();
    }

    public function restoreAll(array $galleries = []): bool
    {
        return EventImage::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->restore();
    }

    public function deletePermanent(EventImage $eventImage): bool
    {
        $eventImage->deleteImage();

        return $eventImage->forceDelete();
    }

    public function deletePermanentAll(array $galleries = []): bool
    {
        $galleries = EventImage::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->get();

        foreach ($galleries as $eventImage) {
            $eventImage->deleteImage();
            $eventImage->forceDelete();
        }

        return true;
    }

    public function latest(): object
    {
        return EventImage::with('event')->latest()->active()->limit(12)->get();
    }
}
