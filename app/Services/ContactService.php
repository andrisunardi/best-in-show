<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function index(
        string $name = '',
        string $company = '',
        string $email = '',
        string $phone = '',
        string $subject = '',
        string $message = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $contacts = Contact::query()
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($company, fn ($q) => $q->where('company', 'LIKE', "%{$company}%"))
            ->when($email, fn ($q) => $q->where('email', 'LIKE', "%{$email}%"))
            ->when($phone, fn ($q) => $q->where('phone', 'LIKE', "%{$phone}%"))
            ->when($subject, fn ($q) => $q->where('subject', 'LIKE', "%{$subject}%"))
            ->when($message, fn ($q) => $q->where('message', 'LIKE', "%{$message}%"))
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
        return Contact::create($data);
    }

    public function clone(array $data, Contact $contact): Contact
    {
        return Contact::create($data);
    }

    public function edit(Contact $contact, array $data = []): Contact
    {
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
        return $contact->forceDelete();
    }

    public function deletePermanentAll(array $contacts = []): bool
    {
        return Contact::when($contacts, fn ($q) => $q->whereIn('id', $contacts))->onlyTrashed()->forceDelete();
    }
}
