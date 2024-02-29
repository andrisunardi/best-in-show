<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Support\Str;

class ContactDeletePermanent extends Component
{
    public function mount($contact)
    {
        $contact = Contact::onlyTrashed()->findOrFail($contact);

        (new ContactService())->deletePermanent(contact: $contact);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.contact')." - {$contact->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.contact.trash');
        }

        return redirect()->route('cms.contact.index');
    }
}
