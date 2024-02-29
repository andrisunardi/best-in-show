<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Services\ContactService;

class ContactTrashPage extends Component
{
    public $name = '';

    public $company = '';

    public $email = '';

    public $phone = '';

    public $subject = '';

    public $message = '';

    public $is_active = [];

    public $queryString = [
        'name',
        'company',
        'email',
        'phone',
        'subject',
        'message',
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
            'name',
            'company',
            'email',
            'phone',
            'subject',
            'message',
            'is_active',
        ]);
    }

    public function getContacts()
    {
        return (new ContactService())->index(
            name: $this->name,
            company: $this->company,
            email: $this->email,
            phone: $this->phone,
            subject: $this->subject,
            message: $this->message,
            is_active: $this->is_active,
            trash: true,
        );
    }

    public function render()
    {
        return view('livewire.cms.contact.trash', [
            'contacts' => $this->getContacts(),
        ]);
    }
}
