<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Event;
use App\Models\EventVideo;

class EventVideoService
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
        $galleries = EventVideo::with('event')
            ->when($event_id, fn ($q) => $q->where('event_id', $event_id))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $galleries->paginate($per_page);
        }

        return $galleries->get();
    }

    public function add(array $data = []): EventVideo
    {
        $event = Event::find($data['event_id']);

        $data['video'] = LivewireUpload::upload(
            file: $data['video'],
            name: $event->name,
            disk: 'videos',
            directory: 'event',
            deleteAsset: false,
        );

        return EventVideo::create($data);
    }

    public function clone(array $data, EventVideo $eventVideo): EventVideo
    {
        $event = Event::find($data['event_id']);

        $data['video'] = LivewireUpload::upload(
            file: $data['video'],
            name: $event->name,
            disk: 'videos',
            directory: 'event',
            checkAsset: $eventVideo->checkVideo(),
            fileAsset: $eventVideo->video,
            deleteAsset: false,
        );

        return EventVideo::create($data);
    }

    public function edit(EventVideo $eventVideo, array $data = []): EventVideo
    {
        $event = Event::find($data['event_id']);

        $data['video'] = LivewireUpload::upload(
            file: $data['video'],
            name: $event->name,
            disk: 'videos',
            directory: 'event',
            checkAsset: $eventVideo->checkVideo(),
            fileAsset: $eventVideo->video,
            deleteAsset: true,
        );

        $eventVideo->update($data);
        $eventVideo->refresh();

        return $eventVideo;
    }

    public function active(EventVideo $eventVideo): EventVideo
    {
        $eventVideo->is_active = ! $eventVideo->is_active;
        $eventVideo->save();
        $eventVideo->refresh();

        return $eventVideo;
    }

    public function deleteVideo(EventVideo $eventVideo)
    {
        $eventVideo->deleteVideo();

        $eventVideo->video = null;
        $eventVideo->save();
        $eventVideo->refresh();

        return $eventVideo;
    }

    public function delete(EventVideo $eventVideo): bool
    {
        return $eventVideo->delete();
    }

    public function deleteAll(array $galleries = []): bool
    {
        return EventVideo::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->delete();
    }

    public function restore(EventVideo $eventVideo): bool
    {
        return $eventVideo->restore();
    }

    public function restoreAll(array $galleries = []): bool
    {
        return EventVideo::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->restore();
    }

    public function deletePermanent(EventVideo $eventVideo): bool
    {
        $eventVideo->deleteVideo();

        return $eventVideo->forceDelete();
    }

    public function deletePermanentAll(array $galleries = []): bool
    {
        $galleries = EventVideo::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->get();

        foreach ($galleries as $eventVideo) {
            $eventVideo->deleteVideo();
            $eventVideo->forceDelete();
        }

        return true;
    }

    public function latest(): object
    {
        return EventVideo::with('event')->latest()->active()->limit(12)->get();
    }
}
