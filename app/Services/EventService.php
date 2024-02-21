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
        string $date = '',
        array $is_active = [],
        string|int $role_id = '',
        string $permission_name = '',
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $events = Event::query()
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($name_idn, fn ($q) => $q->where('name_idn', 'LIKE', "%{$name_idn}%"))
            ->when($youtube, fn ($q) => $q->where('youtube', 'LIKE', "%{$youtube}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($role_id, fn ($q) => $q->role($role_id))
            ->when($permission_name, fn ($q) => $q->permission($permission_name))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $events->paginate($per_page);
        }

        return $events->get();
    }

    public function add(array $data = []): Event
    {
        $data['product_image'] = LivewireUpload::upload(
            file: $data['product_image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-image',
            deleteAsset: false,
        );

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'event',
            deleteAsset: false,
        );

        $event = Event::create($data);

        return $event;
    }

    public function clone(array $data, Event $event): Event
    {
        $data['product_image'] = LivewireUpload::upload(
            file: $data['product_image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-image',
            checkAsset: $event->checkProductImage(),
            fileAsset: $event->image,
            deleteAsset: false,
        );

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'event',
            checkAsset: $event->checkImage(),
            fileAsset: $event->image,
            deleteAsset: false,
        );

        $event = Event::create($data);

        return $event;
    }

    public function edit(Event $event, array $data = []): Event
    {
        $data['product_image'] = LivewireUpload::upload(
            file: $data['product_image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-image',
            checkAsset: $event->checkProductImage(),
            fileAsset: $event->image,
            deleteAsset: true,
        );

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'event',
            checkAsset: $event->checkImage(),
            fileAsset: $event->image,
            deleteAsset: true,
        );

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

    public function deleteProductImage(Event $event)
    {
        $event->deleteProductImage();

        $event->product_image = null;
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
        $event->deleteProductImage();
        $event->deleteImage();

        return $event->forceDelete();
    }

    public function deletePermanentAll(array $events = []): bool
    {
        $events = Event::when($events, fn ($q) => $q->whereIn('id', $events))->onlyTrashed()->get();

        foreach ($events as $event) {
            $event->deleteProductImage();
            $event->deleteImage();
            $event->forceDelete();
        }

        return true;
    }

    public function resetPassword(Event $event): string
    {
        $password = Str::random(5);
        $event->update(['password' => Hash::make($password)]);
        $event->refresh();

        return $password;
    }
}
