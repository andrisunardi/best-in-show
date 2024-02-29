<?php

namespace App\Livewire\CMS\Contact;

use Andrisunardi\Library\Utils;
use App\Livewire\CMS\Component;
use App\Models\Contact;
use App\Services\ContactService;

class ContactActive extends Component
{
    public function mount(Contact $contact)
    {
        (new ContactService())->active(contact: $contact);

        $this->flash('success', trans('index.active_success'), [
            'html' => trans('index.contact')." - {$contact->id} - ".Utils::translate(Utils::active($contact->is_active)),
        ]);

        return redirect(url()->previous());
    }
}
