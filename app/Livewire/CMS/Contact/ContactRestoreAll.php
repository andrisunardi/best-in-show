<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Services\ContactService;

class ContactRestoreAll extends Component
{
    public function mount()
    {
        (new ContactService())->restoreAll();

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.all').' - '.trans('index.contact').' - '.trans('index.restored'),
        ]);

        return redirect()->route('cms.contact.trash');
    }
}
