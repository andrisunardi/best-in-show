<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Models\Contact;

class ContactViewPage extends Component
{
    public $contact;

    public function mount($contact)
    {
        $this->contact = Contact::withTrashed()->findOrFail($contact);
    }

    public function render()
    {
        return view('livewire.cms.contact.view');
    }
}
