<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Services\ContactService;

class ContactDeletePermanentAll extends Component
{
    public function mount()
    {
        (new ContactService())->deletePermanentAll();

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.all').' - '.trans('index.contact').' - '.trans('index.deleted_permanently'),
        ]);

        return redirect()->route('cms.contact.trash');
    }
}
