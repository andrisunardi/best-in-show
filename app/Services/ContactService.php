<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Contact;

class ContactService
{
    public function index(
        string|int|null $category = '',
        string $message = '',
        string $first_name = '',
        string $last_name = '',
        string $email = '',
        string $address = '',
        string $city = '',
        string $province = '',
        string $postal_code = '',
        string $platform = '',
        string $phone_country = '',
        string $phone = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $contacts = Contact::query()
            ->when($category, fn ($q) => $q->where('category', $category))
            ->when($message, fn ($q) => $q->where('message', 'LIKE', "%{$message}%"))
            ->when($first_name, fn ($q) => $q->where('first_name', 'LIKE', "%{$first_name}%"))
            ->when($last_name, fn ($q) => $q->where('last_name', 'LIKE', "%{$last_name}%"))
            ->when($email, fn ($q) => $q->where('email', 'LIKE', "%{$email}%"))
            ->when($address, fn ($q) => $q->where('address', 'LIKE', "%{$address}%"))
            ->when($city, fn ($q) => $q->where('city', 'LIKE', "%{$city}%"))
            ->when($province, fn ($q) => $q->where('province', 'LIKE', "%{$province}%"))
            ->when($postal_code, fn ($q) => $q->where('postal_code', 'LIKE', "%{$postal_code}%"))
            ->when($platform, fn ($q) => $q->where('platform', 'LIKE', "%{$platform}%"))
            ->when($phone_country, fn ($q) => $q->where('phone_country', 'LIKE', "%{$phone_country}%"))
            ->when($phone, fn ($q) => $q->where('phone', 'LIKE', "%{$phone}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $contacts->paginate($per_page);
        }

        return $contacts->get();
    }

    public function add(array $data = []): Contact
    {
        $name = "{$data['first_name']} {$data['last_name']}";

        $data['attachment'] = LivewireUpload::upload(
            file: $data['attachment'],
            name: $name,
            disk: 'files',
            directory: 'contact',
            deleteAsset: false,
        );

        return Contact::create($data);
    }

    public function clone(array $data, Contact $contact): Contact
    {
        $name = "{$data['first_name']} {$data['last_name']}";

        $data['image'] = LivewireUpload::upload(
            file: $data['attachment'],
            name: $name,
            disk: 'files',
            directory: 'contact',
            checkAsset: $contact->checkAttachment(),
            fileAsset: $contact->attachment,
            deleteAsset: false,
        );

        return Contact::create($data);
    }

    public function edit(Contact $contact, array $data = []): Contact
    {
        $name = "{$data['first_name']} {$data['last_name']}";

        $data['image'] = LivewireUpload::upload(
            file: $data['attachment'],
            name: $name,
            disk: 'files',
            directory: 'contact',
            checkAsset: $contact->checkAttachment(),
            fileAsset: $contact->attachment,
            deleteAsset: true,
        );

        $contact->update($data);
        $contact->refresh();

        return $contact;
    }

    public function active(Contact $contact): Contact
    {
        $contact->is_active = ! $contact->is_active;
        $contact->save();
        $contact->refresh();

        return $contact;
    }

    public function delete(Contact $contact): bool
    {
        return $contact->delete();
    }

    public function deleteAttachment(Contact $contact)
    {
        $contact->deleteImage();

        $contact->image = null;
        $contact->save();
        $contact->refresh();

        return $contact;
    }

    public function deleteAll(array $contacts = []): bool
    {
        return Contact::when($contacts, fn ($q) => $q->whereIn('id', $contacts))->delete();
    }

    public function restore(Contact $contact): bool
    {
        return $contact->restore();
    }

    public function restoreAll(array $contacts = []): bool
    {
        return Contact::when($contacts, fn ($q) => $q->whereIn('id', $contacts))->onlyTrashed()->restore();
    }

    public function deletePermanent(Contact $contact): bool
    {
        $contact->deleteImage();

        return $contact->forceDelete();
    }

    public function deletePermanentAll(array $contacts = []): bool
    {
        $contacts = Contact::when($contacts, fn ($q) => $q->whereIn('id', $contacts))->onlyTrashed()->get();

        foreach ($contacts as $contact) {
            $contact->deleteImage();
            $contact->forceDelete();
        }

        return true;
    }
}
