<?php

namespace App\Livewire\CMS\Contact;

use App\Enums\ContactCategory;
use App\Livewire\CMS\Component;
use App\Services\ContactService;

class ContactTrashPage extends Component
{
    public $category = '';

    public $message = '';

    public $first_name = '';

    public $last_name = '';

    public $email = '';

    public $address = '';

    public $city = '';

    public $province = '';

    public $postal_code = '';

    public $platform = '';

    public $phone_country = '';

    public $phone = '';

    public $is_active = [];

    public $queryString = [
        'category',
        'message',
        'first_name',
        'last_name',
        'email',
        'address',
        'city',
        'province',
        'postal_code',
        'platform',
        'phone_country',
        'phone',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'category',
            'message',
            'first_name',
            'last_name',
            'email',
            'address',
            'city',
            'province',
            'postal_code',
            'platform',
            'phone_country',
            'phone',
            'is_active',
        ]);
    }

    public function getContactCategories()
    {
        return ContactCategory::cases();
    }

    public function getContacts()
    {
        return (new ContactService())->index(
            category: $this->category,
            message: $this->message,
            first_name: $this->first_name,
            last_name: $this->last_name,
            email: $this->email,
            address: $this->address,
            city: $this->city,
            province: $this->province,
            postal_code: $this->postal_code,
            platform: $this->platform,
            phone_country: $this->phone_country,
            phone: $this->phone,
            is_active: $this->is_active,
            trash: true,
        );
    }

    public function render()
    {
        return view('livewire.cms.contact.trash', [
            'contactCategories' => $this->getContactCategories(),
            'contacts' => $this->getContacts(),
        ]);
    }
}
