<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Models\Contact;
use App\Services\ContactService;

class ContactDelete extends Component
{
    public function mount(Contact $contact)
    {
        (new ContactService())->delete(contact: $contact);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.contact')." - {$contact->id} - ".trans('index.deleted'),
        ]);

        return redirect(url()->previous());
    }
}
