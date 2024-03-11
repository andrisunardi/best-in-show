<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EventService
{
    public function index(
        string $name = '',
        string $name_idn = '',
        string $description = '',
        string $description_idn = '',
        string $location = '',
        string $date = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $events = Event::query()
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($name_idn, fn ($q) => $q->where('name_idn', 'LIKE', "%{$name_idn}%"))
            ->when($description, fn ($q) => $q->where('description', 'LIKE', "%{$description}%"))
            ->when($description_idn, fn ($q) => $q->where('description_idn', 'LIKE', "%{$description_idn}%"))
            ->when($location, fn ($q) => $q->where('location', 'LIKE', "%{$location}%"))
            ->when($date, fn ($q) => $q->whereDate('date', $date))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $events->paginate($per_page);
        }

        return $events->get();
    }

    public function add(array $data = []): Event
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'event',
            deleteAsset: false,
        );

        $data['video'] = LivewireUpload::upload(
            file: $data['video'],
            name: $data['name'],
            disk: 'videos',
            directory: 'event',
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        $event = Event::create($data);

        return $event;
    }

    public function clone(array $data, Event $event): Event
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'event',
            checkAsset: $event->checkImage(),
            fileAsset: $event->image,
            deleteAsset: false,
        );

        $data['video'] = LivewireUpload::upload(
            file: $data['video'],
            name: $data['name'],
            disk: 'videos',
            directory: 'event',
            checkAsset: $event->checkVideo(),
            fileAsset: $event->video,
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        $event = Event::create($data);

        return $event;
    }

    public function edit(Event $event, array $data = []): Event
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'event',
            checkAsset: $event->checkImage(),
            fileAsset: $event->image,
            deleteAsset: true,
        );

        $data['video'] = LivewireUpload::upload(
            file: $data['video'],
            name: $data['name'],
            disk: 'videos',
            directory: 'event',
            checkAsset: $event->checkVideo(),
            fileAsset: $event->video,
            deleteAsset: true,
        );

        $data['slug'] = Str::slug($data['name']);

        $event->update($data);
        $event->refresh();

        return $event;
    }

    public function active(Event $event): Event
    {
        $event->is_active = ! $event->is_active;
        $event->save();
        $event->refresh();

        return $event;
    }

    public function deleteImage(Event $event)
    {
        $event->deleteImage();

        $event->image = null;
        $event->save();
        $event->refresh();

        return $event;
    }

    public function deleteVideo(Event $event)
    {
        $event->deleteVideo();

        $event->video = null;
        $event->save();
        $event->refresh();

        return $event;
    }

    public function delete(Event $event): bool
    {
        return $event->delete();
    }

    public function deleteAll(array $events = []): bool
    {
        return Event::when($events, fn ($q) => $q->whereIn('id', $events))->delete();
    }

    public function restore(Event $event): bool
    {
        return $event->restore();
    }

    public function restoreAll(array $events = []): bool
    {
        return Event::when($events, fn ($q) => $q->whereIn('id', $events))->onlyTrashed()->restore();
    }

    public function deletePermanent(Event $event): bool
    {
        $event->deleteImage();
        $event->deleteVideo();

        return $event->forceDelete();
    }

    public function deletePermanentAll(array $events = []): bool
    {
        $events = Event::when($events, fn ($q) => $q->whereIn('id', $events))->onlyTrashed()->get();

        foreach ($events as $event) {
            $event->deleteImage();
            $event->deleteVideo();
            $event->forceDelete();
        }

        return true;
    }
}
