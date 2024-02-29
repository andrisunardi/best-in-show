<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Services\ContactService;

class ContactAddPage extends Component
{
    public $name;

    public $company;

    public $email;

    public $phone;

    public $subject;

    public $message;

    public $is_active = true;

    public function resetFields()
    {
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

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'company' => 'nullable|string|max:50',
            'email' => "required|string|max:50|email:rfc,dns|regex:/^\S*$/u",
            'phone' => 'nullable|string|max:15',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $contact = (new ContactService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.contact')." - {$contact->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.contact.index');
    }

    public function render()
    {
        return view('livewire.cms.contact.add');
    }
}
