<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Models\Contact;
use App\Services\ContactService;

class ContactRestore extends Component
{
    public function mount($contact)
    {
        $contact = Contact::onlyTrashed()->findOrFail($contact);

        (new ContactService())->restore(contact: $contact);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.contact')." - {$contact->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
