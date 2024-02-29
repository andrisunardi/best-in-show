<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\CMS\Component;
use App\Models\Contact;
use App\Services\ContactService;

class ContactClonePage extends Component
{
    public $contact;

    public $name;

    public $company;

    public $email;

    public $phone;

    public $subject;

    public $message;

    public $is_active = true;

    public function mount(Contact $contact)
    {
        $this->name = $contact->name;
        $this->company = $contact->company;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
        $this->is_active = $contact->is_active;
    }

    public function resetFields()
    {
        $this->name = $this->contact->name;
        $this->company = $this->contact->company;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;
        $this->subject = $this->contact->subject;
        $this->message = $this->contact->message;
        $this->is_active = $this->contact->is_active;
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
        $contact = (new ContactService())->clone(data: $this->validate(), contact: $this->contact);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.contact')." - {$contact->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.contact.index');
    }

    public function render()
    {
        return view('livewire.cms.contact.clone');
    }
}
